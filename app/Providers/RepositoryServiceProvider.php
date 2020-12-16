<?php

namespace App\Providers;

use App\Repositories\PermissionRepository;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\RoomRepository;
use App\Repositories\RoomRepositoryContract;
use App\Repositories\RoomTypeRepository;
use App\Repositories\RoomTypeRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RoomTypeRepositoryContract::class,RoomTypeRepository::class);
        $this->app->bind(RoomRepositoryContract::class,RoomRepository::class);
        $this->app->bind(PermissionRepositoryContract::class,PermissionRepository::class);
        $this->app->bind(RoleRepositoryContract::class,RoleRepository::class);
    }
}
