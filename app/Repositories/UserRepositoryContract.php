<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function get($request);
    public function process($request);
}
