<?php

namespace App\Repositories;

interface RoleRepositoryContract
{
    public function get();
    public function process($request);
    public function findById($id);
}
