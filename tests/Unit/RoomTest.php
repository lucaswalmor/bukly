<?php


namespace Tests\Unit\Models;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoomTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_room()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Teste',
            'address' => 'Rua Teste',
            'city' => 'Cidade Teste',
            'state' => 'Estado Teste',
            'zip_code' => '12345',
            'website' => '(link unavailable)'
        ]);

        $room = Room::create([
            'name' => 'Quarto Teste',
            'description' => 'Descrição do quarto',
            'hotel_id' => $hotel->id
        ]);

        $this->assertDatabaseHas('rooms', [
            'name' => 'Quarto Teste',
        ]);
    }

    public function test_room_belongs_to_hotel()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Teste',
            'address' => 'Rua Teste',
            'city' => 'Cidade Teste',
            'state' => 'Estado Teste',
            'zip_code' => '12345',
            'website' => '(link unavailable)'
        ]);

        $room = Room::create([
            'name' => 'Quarto Teste',
            'description' => 'Descrição do quarto',
            'hotel_id' => $hotel->id
        ]);

        $this->assertEquals($hotel->id, $room->hotel->id);
    }

    public function test_delete_room()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Teste',
            'address' => 'Rua Teste',
            'city' => 'Cidade Teste',
            'state' => 'Estado Teste',
            'zip_code' => '12345',
            'website' => '(link unavailable)'
        ]);

        $room = Room::create([
            'name' => 'Quarto Teste',
            'description' => 'Descrição do quarto',
            'hotel_id' => $hotel->id
        ]);

        $room->delete();

        $this->assertDatabaseMissing('rooms', [
            'name' => 'Quarto Teste',
        ]);
    }

    public function test_room_requires_hotel_id_and_fields()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Room::create([
            'name' => 'Quarto Teste',
            'description' => 'Descrição do quarto'
        ]);
    }
}
