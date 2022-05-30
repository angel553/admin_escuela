<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

use App\Models\Materia;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();  
        return view('escuela.indexEstudiantes', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::All();
        return view('escuela.formEstudiante', compact('materias'));
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
            'codigo' => ['required', 'min:9', 'max:9'],
            'carrera' => ['required', 'max:50'],
            'creditos_cursados' => ['required', 'min:0', 'max:99'],            
            'correo' => ['required', 'email'],
            //'materia_id' => ['required'],
        ]);     

        $estudiante = new Estudiante();        
        
        $estudiante->nombre = $request->nombre;         
        $estudiante->codigo = $request->codigo;         
        $estudiante->carrera = $request->carrera;         
        $estudiante->creditos_cursados = $request->creditos_cursados;         
        $estudiante->correo = $request->correo;  
        
        $estudiante->save();

        $estudiante->materias()->attach($request->materia_id);

        //return redirect('/estudiante')->with('success','Publicación Realizada');
        return redirect('/estudiante');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //dd($estudiante);
        return view('Escuela.showEstudiante', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //dd($estudiante);
        $materias = Materia::All();
        return view('Escuela.formEstudiante', compact('estudiante','materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => ['required', 'max:50'],
            'codigo' => ['required', 'min:9', 'max:9'],
            'carrera' => ['required', 'max:50'],
            'creditos_cursados' => ['required', 'min:0', 'max:99'],            
            'correo' => ['required', 'email'],
            //'materia_id' => ['required'],
        ]);             
        
        $estudiante->nombre = $request->nombre;         
        $estudiante->codigo = $request->codigo;         
        $estudiante->carrera = $request->carrera;         
        $estudiante->creditos_cursados = $request->creditos_cursados;         
        $estudiante->correo = $request->correo;  
        
        $estudiante->save();

        $estudiante->materias()->sync($request->materia_id);

        //return redirect('/estudiante')->with('success','Publicación Realizada');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $estudiantes = Estudiante::all();  
        $materias = Materia::all();

        return view('index', compact('estudiantes','materias'));
    }
}
