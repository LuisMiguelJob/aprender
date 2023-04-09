@extends('layouts.windmill')

@section('content')
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Listado de programas
    </h2>

    <!-- Tabla programa -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300" >
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{ route('program.create') }}">
        Agregar Programa
        </a>
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Dependencia</th>
                    <th class="px-4 py-3">Calendario</th>
                    <th class="px-4 py-3">Titular</th>
                    <th class="px-4 py-3">Folio</th>  
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Editar</th>
                </tr>
            </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                    @foreach ($programs as $progra)
                        <tr class="text-gray-700 dark:text-gray-400">    
                            <td class="px-4 py-3"> {{-- ID --}}
                                <div class="flex items-center text-sm" >
                                    {{$progra->id}}
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm" > {{-- Dependencia --}}
                                {{$progra->dependencia}}
                            </td>

                            <td class="px-4 py-3 text-sm" > {{-- Calendario --}}
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100" >
                                    {{$progra->calendario}}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-sm" > {{-- Titular --}}
                                {{$progra->titular}}
                            </td>

                            <td class="px-4 py-3 text-sm" > {{-- Folio --}}
                                {{$progra->folio}}
                            </td>

                            <td class="px-4 py-3 text-sm" > {{-- Folio --}}
                                {{$progra->user->name}} {{-- Aqui se relaciona el uso de hasMany y belongsTo para traer la informacion, en este caso se llama el metodo user y se trae el Name --}}
                            </td>

                            <td class="px-4 py-3 text-sm" > {{-- Nombre --}}
                                <a href="{{ route('program.show', $progra->id) }}">{{$progra->nombre}}</a>
                            </td>

                            <td class="px-4 py-3"> {{-- Editar --}}
                            <div class="flex items-center space-x-4 text-sm">
                                <a
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit" href="{{ route('program.edit', $progra) }}"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                        ></path>
                                    </svg>
                                </a> 
                            </div>
                            </td>

                            
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>  
@endsection

