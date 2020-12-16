<?php

namespace App\Repositories;

interface PermissionRepositoryContract
{
    public function get();
    public function process($request);
    public function findById($id);
}
