@extends('layouts.temp')

@section('content')
    <p>
        <a href="{{ route('program.index') }}">Regresar </a>
    </p>    

    <h1>Formulario de Programa</h1>

    @if(isset($program))
        <form action="{{ route('program.update', $program) }}" method="POST">
            @method('PATCH') 
    @else
        <form action="{{ route('program.store') }}" method="POST">
    @endif

        @csrf
        <label for="calendario">Calendario</label> <!-- $program->cal si existe se pondra el atributo si no se pondra una cadena vacia, C++ condition ? true : false -->
        <input type="text" name="calendario" id="calendario" value="{{ $program->calendario ?? '' }}">
        <br>

        <label for="folio">Folio</label>
        <input type="text" name="folio" id="folio" value="{{ $program->folio ?? '' }}">
        <br>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ $program->nombre ?? '' }}">
        <br>

        <label for="titular">Titular</label>
        <input type="text" name="titular" id="titular" value="{{ $program->titular ?? '' }}">
        <br>

        <label for="dependencia">Dependencia</label>
        <input type="text" name="dependencia" id="dependencia" value="{{ $program->dependencia ?? '' }}">
        <br>

        <input type="submit" value="Guardar">

    </form>
@endsection