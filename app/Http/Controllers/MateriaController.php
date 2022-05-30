<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::all();  
        return view('escuela.indexEstudiantes', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Estudiante::All();
        return view('escuela.formMateria', compact('estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'max:50'],
            'creditos' => ['required', 'min:1', 'max:99'],
            'profesor' => ['required', 'max:50'],
            'turno' => ['required', 'min:0', 'max:99'],            
            'disponible' => ['required'],
            //'estudiante_id' => ['required'],
        ]);
        
        $materia = new Materia();

        $materia->nombre = $request->nombre;         
        $materia->creditos = $request->creditos;         
        $materia->profesor = $request->profesor;         
        $materia->turno = $request->turno;         
        $materia->disponible = $request->disponible;  
        
        $materia->save();

        $materia->estudiantes()->attach($request->estudiante_id);

        return redirect('/estudiante');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
