{{-- Mostrado de errores en el formulario (Displaying The Validation Errors DOCS Laravel) --}}

@if ($errors->any())
<div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
    <h4 class="mb-4 font-semibold">
        Errores en los siguientes campos:
    </h4>
    <p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </p>
</div>
@endif