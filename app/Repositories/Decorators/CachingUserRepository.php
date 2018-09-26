<?php

namespace App\Repositories\Decorators;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Cache\Repository as Cache;

class CachingUserRepository implements UserRepositoryInterface {

    protected $repository;

    protected $cache;

    public function __construct(UserRepositoryInterface $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function all()
    {
        return $this->cache->tags('users')->remember('all', 60, function () {
            return $this->repository->all();
        });
    }

    public function findOrFail($id)
    {
        return $this->cache->tags('users')->remember($id, 60, function () use ($id) {
            return $this->repository->findOrFail($id);
        });
    }
    
    public function create($input)
    {
        $this->cache->tags('users')->flush();
        return $this->repository->create($input);
    }
}