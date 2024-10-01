<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Departamento; // Asegúrate de que este modelo esté definido
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipio::with('departamento')->get(); // Obtener todos los municipios
        return view('municipios.index', ['municipios' => $municipios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all(); // Obtener todos los departamentos
        return view('municipios.create', ['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'departamento_id' => 'required|exists:tb_departamento,id', // Asegúrate de que este campo sea válido
        ]);

        Municipio::create([
            'nombre' => $request->nombre,
            'departamento_id' => $request->departamento_id,
        ]);

        return redirect()->route('municipios.index')->with('success', 'Municipio agregado exitosamente');
    }

    /**
     * Show the specified resource.
     */
    public function show(string $id)
    {
        $municipio = Municipio::findOrFail($id);
        return view('municipios.show', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $municipio = Municipio::findOrFail($id);
        $departamentos = Departamento::all(); // Obtener todos los departamentos
        return view('municipios.edit', ['municipio' => $municipio, 'departamentos' => $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'departamento_id' => 'required|exists:tb_departamento,id', // Validar el departamento
        ]);

        $municipio = Municipio::findOrFail($id);
        $municipio->update([
            'nombre' => $request->nombre,
            'departamento_id' => $request->departamento_id,
        ]);

        return redirect()->route('municipios.index')->with('success', 'Municipio actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();

        return redirect()->route('municipios.index')->with('success', 'Municipio eliminado exitosamente');
    }
}
