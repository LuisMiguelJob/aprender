<?php

namespace App\Http\Controllers;

use App\Models\Lender;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{
    // De esta forma iniciamos una variables "rules" y guardamos un array con las reglas que ocupamos, en el metodo del controlador solo
    // invocamos la variable "rules", esto se usa en el metodo store y  update.
    private $rules;
    public function __construct()
    {
        $this->rules = [
            'nombre' => ['required', 'string', 'min:5', 'max:255'], // Esta es una opcion de agregarlo
            'titular' => ['required', 'string', 'min:5', 'max:255'],
            'dependencia' => 'required|string|max:255', // Esta es otra opcion
            /* 'folio' => 'required|integer|min:1', */
            'calendario' => 'required|string|min:4|max:6',
        ];

        // Con esto validamos que este controlador debe de tener un inicio de sesion (usuario), metodo 2 para middleware
        // En este caso el except es para ver la ruta especificada sin necesidad de inicio de sesion
        $this->middleware('auth'); //->except('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$programs = Program::all();
        $programs = Auth::user()->programs; // con esto solo da los programas del usuario en sesion. uso del metodo creado en el modelo user
        //Auth::user()->programs()->get(); // usado dinamicamente
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

        /* $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:255'], // Esta es una opcion de agregarlo
            'titular' => ['required', 'string', 'min:5', 'max:255'],
            'dependencia' => 'required|string|max:255', // Esta es otra opcion
            'folio' => 'required|integer|min:1',
            'calendario' => 'required|string|min:4|max:6',
        ]); */

        /* Para validar nuestros formularios podemos hace uso del bloque codigo de arriba o podemos hacer lo siguiente */
        /* Hacemos uso de la variable creada al inicio */
        $request->validate($this->rules + ['folio' => 'required|integer|unique:programs,folio']); /* puse programs y Program, funciono */
        /* Hacemos una regla extra donde comprobamos que sea unico el folio escrito comprobando en la base de datos */
        /* se debe de especificar el nombre de la tabla a lado de "unique:" y el nombre de la columna a revisar */

        // con esto comprobamos con dd() si hay datos del usuario
        //dd($request->user());

        //$request->merge(['user_id' => $request->user()->id]); // sirve para agregar mas cosas en el request, en este caso agregamos user_id con su id del usuario en sesion
        //$request->merge(['user_id' => Auth::user()->id]); // Otra forma - necesario agregar use Illuminate\Support\Facades\Auth;
        // Anterior $request->merge(['user_id' => Auth::id()]); // Otra forma, estas 3 opciones son validas, recomiendo la segunda o tercera
        
        // Tomar en cuenta la sintaxis, => ->

        // Para que esto funcione, debes de crear en el modelo una variable "fillable"
        // donde contengan las variables de interes - protected $fillable = ['calendario'];
        // Anterior Program::create($request->all()); 

        // esta es otra forma de hacer un guardado, la otra forma es descomentar los "Anterior" 's
        $program = new Program($request->all());
        $user = Auth::user();
        $user->programs()->save($program); // funciona sin problemas, no entiendo porque el error

        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $lenders = Lender::get();

        return view('program.show', compact('program', 'lenders'));
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

        /* $request->validate($this->rules + ['folio' => 'required|integer|unique:programs,folio']); // Uso de la variable rules para validar reglas en los datos provenienes del request. */

        $request->validate($this->rules + ['folio' => [ // Usado para comprobar que algo es unico pero ignorando el propio registro(id)
            'required', 
            'integer', 
            Rule::unique('programs')->ignore($program->id)
        ]]); // comprobar sintaxis para no tener errores, arriba hay ejemplos de bloques de codigo para validar
        

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

    /* 
    * Agregar un prestador a un programa
    */

    public function addLender(Request $request, Program $program){ // Se agrega una funciona para la seleccion de un prestador en la vista show
        //dd($request->all(), $program);

        $program->lenders()->attach($request->lender_id); // con attach hacemos una relacion prestador/programa , y lo almacena en la tabla correspondiente // Nota:  la tabla debe de ser creada correctamente, ver Notas
        return redirect()->route('program.show', $program);
    }
}
