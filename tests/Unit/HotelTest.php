<?php

namespace Tests\Unit\Models;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @covers \App\Models\Hotel::create
     */
    public function test_create_hotel()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Teste 1',
            'address' => 'Rua Teste',
            'city' => 'Cidade Teste',
            'state' => 'Estado Teste',
            'zip_code' => '12345',
            'website' => '(link unavailable)'
        ]);

        $this->assertDatabaseHas('hotels', [
            'name' => 'Hotel Teste 1',
        ]);
    }

    public function test_hotel_has_rooms()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Teste 2',
            'address' => 'Rua Teste',
            'city' => 'Cidade Teste',
            'state' => 'Estado Teste',
            'zip_code' => '12345',
            'website' => '(link unavailable)'
        ]);

        $room = Room::create([
            'hotel_id' => $hotel->id,
            'name' => 'Hotel Teste 2',
            'description' => 'Descrição do quarto',
        ]);

        $this->assertEquals(1, $hotel->rooms()->count());
    }

    public function test_hotel_delete()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Teste 3',
            'address' => 'Rua Teste',
            'city' => 'Cidade Teste',
            'state' => 'Estado Teste',
            'zip_code' => '12345',
            'website' => '(link unavailable)'
        ]);

        $room = Room::create([
            'hotel_id' => $hotel->id,
            'name' => 'Hotel Teste 3',
            'description' => 'Descrição do quarto',
        ]);

        $hotel->delete();

        $this->assertDatabaseMissing('hotels', [
            'name' => 'Hotel Teste',
        ]);

        $this->assertDatabaseMissing('rooms', [
            'name' => 'Hotel Teste 3',
        ]);
    }

    public function test_hotel_requires_all_fields()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Hotel::create([
            'address' => 'Rua Teste',
            'city' => 'Cidade Teste',
            'state' => 'Estado Teste',
            'zip_code' => '12345',
            'website' => '(link unavailable)'
        ]);
    }
}
