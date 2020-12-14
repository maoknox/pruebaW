create sequence SEQ_ID_WEATHER
increment by 1
start with 1
nocycle
order
/

/*==============================================================*/
/* Table: DW                                                    */
/*==============================================================*/
create table DW 
(
   ID                   INTEGER              not null,
   NAME                 VARCHAR2(50),
   TIME                 VARCHAR2(50),
   WEATHER              VARCHAR2(100),
   constraint PK_DW primary key (ID)
)
/


create trigger TIB_WEATHER before insert
on DW for each row
declare
    integrity_error  exception;
    errno            integer;
    errmsg           char(200);
    dummy            integer;
    found            boolean;

begin
    --  Column "ID" uses sequence SEQ_ID_WEATHER
    select SEQ_ID_WEATHER.NEXTVAL INTO :new.ID from dual;

--  Errors handling
exception
    when integrity_error then
       raise_application_error(errno, errmsg);
end;
/
