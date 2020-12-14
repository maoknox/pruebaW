/**
 * Ejecutoria v.1.0
 *
 * @class Ejecutoria
 * @classdesc Pseudo clase para inicializar elementos y controlar dom de la vista ejecutoría del proceso
 * 
 */
var Weather = function(){
    /**************************************************************************/
    /******************************* ATTRIBUTES *******************************/
    /**************************************************************************/
    var self = this;
    self.map="";
    //DOM attributes
    /**************************************************************************/
    /********************* CONFIGURATION AND CONSTRUCTOR **********************/
    /**************************************************************************/
    //Mix the user parameters with the default parameters
    
   
    /**
     * Método constructor
     */
    var Weather = function() {
    	self.div=$("#app");
        setDefaults();
    }();
     
    /**************************************************************************/
    /****************************** SETUP METHODS *****************************/
    /**************************************************************************/
    /**
     * Asigna funcionalidades de elementos del dom seleccionadas
     * @returns {undefined}
     */
    function setDefaults(){
    	self.div.find("#getWeather").on('click',function(){
    		self.getWeather();
    	});
     
                
        
    };    
    

   
   
    /**************************************************************************/
    /********************************** METHODS *******************************/
    /**************************************************************************/
   
	self.convert=function convert(unixtimestamp){

		
		 // Months array
		 var months_arr = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

		 // Convert timestamp to milliseconds
		 var date = new Date(unixtimestamp*1000);

		 // Year
		 var year = date.getFullYear();

		 // Month
		 var month = months_arr[date.getMonth()];

		 // Day
		 var day = date.getDate();

		 // Hours
		 var hours = date.getHours();

		 // Minutes
		 var minutes = "0" + date.getMinutes();

		 // Seconds
		 var seconds = "0" + date.getSeconds();

		 // Display date time in MM-dd-yyyy h:m:s format
		 var convdataTime = month+'-'+day+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
		 
		 return convdataTime;
	 
	}
    
	self.loadMap=function(){
		 self.map = L.map('divMap').setView([44.09614460121544, -90.32515044791771], 4);
		  L.tileLayer('https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png', {
     attribution:
         '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors' +
         ', Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>',
     maxZoom: 18
 }).addTo(self.map);
// 		   var marker = L.marker([44.09614460121544, -103.32515044791771]).addTo(self.map);

// var popup = marker.bindPopup('<b>Hello world!</b><br />I am a popup.');
//  popup.openPopup();

	}
    

    /**************************************************************************/
    /******************************* SYNC METHODS *****************************/
    /**************************************************************************/

    self.getWeather=function(){
    	$.ajax({
		  url:'/api/weather',		  
		  method: 'GET',
		  success: function(data){
		  	var tr="";
		  	$.each(data,function(key,value){
		  		tr+="<tr><td>"+value.name+"</td><td>"+self.convert(value.time)+"</td><td>"+value.weather+"</td></tr>";
		  		console.log(value.name+" "+self.convert(value.time)+" "+value.weather);
		  	})
		  	self.div.find("#tbWeather").html(tr);
		    // self.div.find("#mi").html(JSON.stringify(data));
		  }
		});
    }
    

    self.saveWeather=function(name,time,weather){
    	$.ajax({
		  url:'/api/weather',		  
		  method: 'POST',
		  data:{name:name,time:time,weather:weather},
		  success: function(data){
		  	console.log(data);
		    // self.div.find("#mi").html(JSON.stringify(data));
		  }
		});
    }

    /**   
    * Consulta y gurda datos de humedad
    *
    * Captura los datos del formulario así como la identificación del proceso
    * para llamar a servicio registraEjecutoria y guardar los datos
    * @memberof Ejecutoria
    * @function
    * @return {undefined}
    */ 
    
 
    self.getW=function(city,container){  
        console.log('setup');
       var url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
		var method = 'GET';
		var app_id = 'i8JWBHaV';
		var consumer_key = 'dj0yJmk9YU1UNVk0UWRRZW9zJmQ9WVdrOWFUaEtWMEpJWVZZbWNHbzlNQT09JnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PWFk';
		var consumer_secret = 'fb2d61571529ea11a3eb47628a2acec366a942b5';
		var concat = '&';
		var query = {'location': city, 'format': 'json'};
		var oauth = {
		    'oauth_consumer_key': consumer_key,
		    'oauth_nonce': Math.random().toString(36).substring(2),
		    'oauth_signature_method': 'HMAC-SHA1',
		    'oauth_timestamp': parseInt(new Date().getTime() / 1000).toString(),
		    'oauth_version': '1.0'
		};

		var merged = {}; 
		$.extend(merged, query, oauth);
		// Note the sorting here is required
		var merged_arr = Object.keys(merged).sort().map(function(k) {
		  return [k + '=' + encodeURIComponent(merged[k])];
		});
		var signature_base_str = method
		  + concat + encodeURIComponent(url)
		  + concat + encodeURIComponent(merged_arr.join(concat));

		var composite_key = encodeURIComponent(consumer_secret) + concat;
		var hash = CryptoJS.HmacSHA1(signature_base_str, composite_key);
		var signature = hash.toString(CryptoJS.enc.Base64);

		oauth['oauth_signature'] = signature;
		var auth_header = 'OAuth ' + Object.keys(oauth).map(function(k) {
		  return [k + '="' + oauth[k] + '"'];
		}).join(',');

		$.ajax({
		  url: url + '?' + $.param(query),		  
		  headers: {
		    'Authorization': auth_header,
		    'X-Yahoo-App-Id': app_id 
		  },
		  method: 'GET',
		  success: function(data){
		  	console.log(data);
		  	var dataW="<div><p>City: "+
		    	data.location.city+"</p><p> Humidity: "+
		    	data.current_observation.atmosphere.humidity+
		    	"</p><p> Date: "+self.convert(data.current_observation.pubDate)+
		    	"</p></div>"
		    self.div.find(container).html(dataW);
		    var popup = L.popup({'autoClose': false})
    .setContent(dataW);
		    var marker = L.marker([data.location.lat, data.location.long]).addTo(self.map);

var popup = marker.bindPopup(popup);
 popup.openPopup();
		    self.saveWeather(data.location.city,data.current_observation.pubDate,data.current_observation.atmosphere.humidity);
		  }
		});
    }
    /**************************************************************************/
    /******************************* DOM METHODS ******************************/
    /**************************************************************************/
    
    /**************************************************************************/
    /****************************** OTHER METHODS *****************************/
    /**************************************************************************/
    
};
$(document).ready(function() {
    window.Weather=new Weather(); 
    Weather.getW('miami,ue','#mi');
    Weather.getW('orlando,ue',"#or");
    Weather.getW('losangeles,ue','#la');
    Weather.loadMap();
});