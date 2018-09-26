<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface {

    public function all();

    public function findOrFail($id);

    public function create($input);
    
}