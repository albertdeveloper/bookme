<?php

namespace App\Repositories;

interface RoomTypeRepositoryContract
{
    public function get();
    public function list();
    public function process($request);
    public function findById($id);
    public function delete($id);
}
