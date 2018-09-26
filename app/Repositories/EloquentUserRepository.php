<?php

namespace App\Repositories;
use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Hash;

class EloquentUserRepository implements UserRepositoryInterface {

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($input)
    {
        $user = new $this->model;
        $user->email = $input['email'];
        $user->name = $input['name'];
        $user->password = Hash::make($input['password']);
        $user->save();
        return $user;
    }
}