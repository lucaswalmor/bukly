<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('quartos/Quartos', [
            'quartos' => Room::with('hotel')->get()->map(function ($quarto) {
                return [
                    'id' => $quarto->id,
                    'name' => $quarto->name,
                    'description' => $quarto->description,
                    'hotel_name' => $quarto->hotel->name,
                ];
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('quartos/CadastroQuarto', [
            'hoteis' => Hotel::all()->map(function ($hotel) {
                return [
                    'id' => $hotel->id,
                    'name' => $hotel->name,
                ];
            }),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        try {
            $data = $request->validated();
            
            $quarto = Room::create($data);

            if ($quarto) {
                return redirect()->route('room.index')->with('success', 'Quarto cadastrado com sucesso!');
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
        $quarto = Room::find($id);
        
        $quarto = [
            'id' => $quarto->id,
            'name' => $quarto->name,
            'description' => $quarto->description,
        ];

        return Inertia::render('quartos/VisualizarQuarto', [
            'quarto' => $quarto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quarto = Room::find($id);
        
        $quarto = [
            'id' => $quarto->id,
            'name' => $quarto->name,
            'description' => $quarto->description,
            'hotel_id' => $quarto->hotel_id,
        ];

        return Inertia::render('quartos/EditarQuarto', [
            'quarto' => $quarto,
            'hoteis' => Hotel::all()->map(function ($hotel) {
                return [
                    'id' => $hotel->id,
                    'name' => $hotel->name,
                ];
            }),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quarto = Room::find($id);

        $quarto->name = $request->name;
        $quarto->description = $request->description;
        $quarto->hotel_id = $request->hotel_id;

        $quarto->update();

        return redirect()->route('room.index')->with('success', 'Quarto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::find($id)->delete();

        return redirect()->route('room.index')->with('success', 'Quarto excluído com sucesso!');
    }
}
