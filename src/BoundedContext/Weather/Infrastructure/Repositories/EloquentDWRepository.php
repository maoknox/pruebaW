<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Infrastructure\Repositories;

use App\DW as EloquentDWModel;
use Src\BoundedContext\Weather\Domain\Contracts\DWRepositoryContract;
use Src\BoundedContext\Weather\Domain\DW;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWId;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWName;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWTime;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWWeather;

final class EloquentDWRepository implements DWRepositoryContract
{
    private $eloquentDWModel;

    public function __construct()
    {
        $this->eloquentDWModel = new EloquentDWModel;
    }

    // public function find(DWId $id): ?DW
    // {
    //     $dw = $this->eloquentDWModel->findOrFail($id->value());

    //     // Return Domain User model
    //     return new DW(
    //         new DWName($dw->name),
    //         new DWTime($dw->time),
    //         new DWWeather($dw->weather)          
    //     );
    // }
    public function find()
    {
        $dw = $this->eloquentDWModel->get();

        // Return Domain User model
        return $dw;
    }

    public function findByCriteria(DWName $name, DWTime $time): ?DW
    {
        $dw = $this->eloquentDWModel
            ->where('name', $name->value())
            ->where('time', $time->value())
            ->firstOrFail();

        // Return Domain User model
        return new DW(
            new DWName($dw->name),
            new DWTime($dw->time),
            new DWWeather($dw->weather)          
        );
    }

    public function save(DW $dw): void
    {
        $newDW = $this->eloquentDWModel;

        $data = [
            'name'              => $dw->name()->value(),
            'time'             => $dw->time()->value(),
            'weather' => $dw->weather()->value()
        ];

        $newDW->create($data);
    }

    // public function update(UserId $id, User $user): void
    // {
    //     $userToUpdate = $this->eloquentUserModel;

    //     $data = [
    //         'name'  => $user->name()->value(),
    //         'email' => $user->email()->value(),
    //     ];

    //     $userToUpdate
    //         ->findOrFail($id->value())
    //         ->update($data);
    // }

    // public function delete(UserId $id): void
    // {
    //     $this->eloquentUserModel
    //         ->findOrFail($id->value())
    //         ->delete();
    // }
}
