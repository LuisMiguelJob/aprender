@extends('layouts.windmill')

@section('content')

    <h4 class="mt-4 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300" >
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{ route('program.index') }}">
        Regresar
        </a>
    </h4>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300" >
        Formulario de Programa
    </h4>

    @include('partials.form-errors')

    {{--  --}}

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800
    mt-4">
        
        @if(isset($program)) {{-- Si existe una varriable inicializa llamada $program haz los siguiente --}}
            <form action="{{ route('program.update', $program) }}" method="POST">
            @method('PATCH') 
        @else
            <form action="{{ route('program.store') }}" method="POST">
        @endif
            @csrf

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre del programa:</span>
                
            <input
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('nombre') border-red-600 focus:border-red-400 focus:shadow-outline-red @endif"
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre') ?? $program->nombre ?? '' }}"
            />

            @error('nombre')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror 

        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Dependencia:</span>
            <input
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('dependencia') border-red-600 focus:border-red-400 focus:shadow-outline-red @endif"
                type="text"
                name="dependencia"
                id="dependencia"
                value="{{ old('dependencia') ?? $program->dependencia ?? '' }}"
            />

            @error('dependencia')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span> 
            @enderror 

        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Calendario:</span>
            <input
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('calendario') border-red-600 focus:border-red-400 focus:shadow-outline-red @endif"
                type="text"
                name="calendario"
                id="calendario"
                value="{{ old('calendario') ?? $program->calendario ?? '' }}"
            />

            @error('calendario')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror 

        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Titular:</span>
            <input
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('titular') border-red-600 focus:border-red-400 focus:shadow-outline-red @endif"
                type="text"
                name="titular"
                id="titular"
                value="{{ old('titular') ?? $program->titular ?? '' }}"
            />

            @error('titular')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror 

        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Folio:</span>
            <input
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input @error('folio') border-red-600 focus:border-red-400 focus:shadow-outline-red @endif"
                type="number"
                name="folio"
                id="folio"
                value="{{ old('folio') ?? $program->folio ?? '' }}"
            />

            @error('folio')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror 

        </label>

        <div class="mt-4">
            <button class="flex items-center justify-between px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >
                <svg class="w-4 h-4 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                <span>Guardar</span>
            </button>
        <div>

        </form>
    </div>
@endsection