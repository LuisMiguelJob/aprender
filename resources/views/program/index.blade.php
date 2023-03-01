@extends('layouts.temp')

@section('content')
    <p>
        <a href="{{ route('program.create') }}">Agregar Programa</a>
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
                <th>Ver</th>
                <th>Editar</th>
            </tr>
        <tbody>
            @foreach ($programs as $progra)
            <tr>
                <td>{{$progra->id}}</td>
                <td>{{$progra->calendario}}</td>
                <td>{{$progra->folio}}</td>
                <td>{{$progra->nombre}}</td>
                <td>{{$progra->dependencia}}</td>
                <td>{{$progra->titular}}</td>
                <td><button><a href="{{ route('program.show', $progra->id) }}">Ver</a></button></td>
                <td>
                    <button><a href="{{ route('program.edit', $progra) }}">Editar</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>

        </thead>
    </table>
@endsection

