<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('program.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$programa = new Program();
        //$programa->calendario = $request->calendario;
        //$programa->folio = $request->folio;
        //$programa->nombre = $request->nombre;
        //$programa->dependencia = $request->dependencia;
        //$programa->titular = $request->titular;
        //$programa->save();

        // Para que esto funcione, debes de crear en el modelo una variable "fillable"
        // donde contengan las variables de interes - protected $fillable = ['calendario'];
        Program::create($request->all());  

        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('program.form', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
        // $request es la informacion que ser acumulo en el formulario
        // $program es la variable que se manda
    {
        //$program->calendario = $request->calendario;
        //$program->folio = $request->folio;
        //$program->nombre = $request->nombre;
        //$program->dependencia = $request->dependencia;
        //$program->titular = $request->titular;
        //$program->save();

        Program::where('id', $program->id)->update($request->except('_token', '_method'));

        return redirect()->route('program.show', $program);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('program.index');
    }
}
