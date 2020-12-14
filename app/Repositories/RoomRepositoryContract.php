<?php

namespace App\Repositories;

interface RoomRepositoryContract
{
    public function get($request);
    public function process($request);
}
