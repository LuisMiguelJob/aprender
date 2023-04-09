@extends('layouts.windmill')

@section('content')

<h4 class="mt-4 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300" >
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{ route('program.index') }}">
        Regresar
    </a>
</h4>

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Detalle de programa
</h2>

<div class="grid gap-6 mb-8 md:grid-cols-2">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            {{ $program->nombre }}
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            <ul>
                <li>Dependencia: {{ $program->dependencia}}</li>
                <li>Calendario: {{ $program->calendario }}</li>
                <li>Titular: {{ $program->titular }}</li>
                <li>Folio: {{ $program->folio }}</li>
            </ul>
        </p>
    </div>

    
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Prestadores del programa
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            <ul>
                @foreach ($program->lenders as $lender)
                    <li>{{ $lender->nombre }}</li>
                @endforeach
            </ul>
        </p>
    </div>
    
</div>

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Prestadores
</h2>

<div class="grid gap-6 mb-8 md:grid-cols-2">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
          Agregar Prestadores
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            <form action="{{ route('program.add-lender', $program) }}" method="POST"> {{-- El agregar la variable program hace que se relacione con la ruta creada y despues mandarlo al metodo del controlador --}}
                @csrf
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                    Seleccione Prestador
                    </span>
                    
                    {{-- pretador_id = Se pone como referencia el nombre de la llave foranea correspondiente --}}

                    {{-- version 1 --}}
                    {{-- <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="prestador_id" 
                        >

                        @foreach ($lenders as $lender)
                            <option value="{{ $lender->id }}">{{ $lender->nombre }}</option>      
                        @endforeach
                    
                    </select> --}}

                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                        multiple=""
                        name="lender_id[]"
                        >
                        @foreach ($lenders as $lender)
                            <option value="{{ $lender->id }}">{{ $lender->nombre }}</option>      
                        @endforeach
                    </select>

                </label>

                {{-- Boton agregar --}}
                <button class="mt-4 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span>Agregar</span>
                </button>
            </form>
        </p>
    </div>
</div>  

<form action="{{ route('program.destroy', $program) }}" method="POST">
    @csrf
    @method('DELETE')

    <div>
        <button class="mt-2 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
          <span>Borrar programa</span>
        </button>
    </div>
</form>


@endsection