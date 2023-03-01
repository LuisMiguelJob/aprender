@extends('layouts.temp')

@section('content')
    <h1>Vista mostrar</h1>

    <p>
        <a href="{{ route('program.index') }}">Regresar</a>
    </p>    

    <table style="border: 1px solid black">
        <thead>
            <tr>
                <th>ID</th>
                <th>Calendario</th>
                <th>Folio</th>                
                <th>Nombre</th>
                <th>Dependencia</th>
                <th>Titular</th>
            </tr>
        <tbody>
            <tr>
                <td>{{$program->id}}</td>
                <td>{{$program->calendario}}</td>
                <td>{{$program->folio}}</td>
                <td>{{$program->nombre}}</td>
                <td>{{$program->dependencia}}</td>
                <td>{{$program->titular}}</td>
            </tr>
        </tbody>

        </thead>
    </table>

    <form action="{{ route('program.destroy', $program) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar Programa">
    </form>
@endsection