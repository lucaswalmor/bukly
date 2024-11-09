<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('hotel/Hoteis', [
            'hoteis' => Hotel::all()->map(function ($hotel) {
                return [
                    'id' => $hotel->id,
                    'name' => $hotel->name,
                    'address' => $hotel->address,
                    'city' => $hotel->city,
                    'state' => $hotel->state,
                    'zip_code' => $hotel->zip_code,
                    'website' => $hotel->website,
                ];
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('hotel/CadastroHotel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
        try {
            $data = $request->validated();
            
            $hotel = Hotel::create($data);

            if ($hotel) {
                return redirect()->route('hotel.index')->with('success', 'Hotel cadastrado com sucesso!');
            }
        } catch (ValidationException $e) {
            $firstError = $e->validator->errors()->first();

            throw new \Exception($firstError);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = Hotel::find($id);
        
        $hotel = [
            'id' => $hotel->id,
            'name' => $hotel->name,
            'address' => $hotel->address,
            'city' => $hotel->city,
            'state' => $hotel->state,
            'zip_code' => $hotel->zip_code,
            'website' => $hotel->website,
        ];

        return Inertia::render('hotel/VisualizarHotel', [
            'hotel' => $hotel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = Hotel::find($id);
        
        $hotel = [
            'id' => $hotel->id,
            'name' => $hotel->name,
            'address' => $hotel->address,
            'city' => $hotel->city,
            'state' => $hotel->state,
            'zip_code' => $hotel->zip_code,
            'website' => $hotel->website,
        ];

        return Inertia::render('hotel/EditarHotel', [
            'hotel' => $hotel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel = Hotel::find($id);

        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->city = $request->city;
        $hotel->state = $request->state;
        $hotel->zip_code = $request->zip_code;
        $hotel->website = $request->website;

        $hotel->update();

        return redirect()->route('hotel.index')->with('success', 'Hotel editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hotel::find($id)->delete();

        return redirect()->route('hotel.index')->with('success', 'Hotel excluído com sucesso!');
    }
}
