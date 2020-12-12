<?php

namespace Tests\Feature\Room;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoomTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoomTypeIndex()
    {
        $response = $this->get('/room_type');

        $response->assertStatus(200);
    }
}
