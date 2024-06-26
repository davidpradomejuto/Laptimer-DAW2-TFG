@extends('layouts.plantilla')
@section('titulo', 'Editar jugador')
@section('contenido')
<h1 class="text-center my-4">Editar Jugador {{ $jugador->nombre }}</h1>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Hubo errores en el formulario:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('jugadores.update', $jugador) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del jugador: *</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $jugador->nombre) }}" required>
            <div class="invalid-feedback">
                Por favor, ingrese el nombre del jugador.
            </div>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha: *</label>
            <input type="date" id="fecha" name="fecha" class="form-control" value="{{ old('fecha', $jugador->fecha) }}" required>
            <div class="invalid-feedback">
                Por favor, seleccione una fecha.
            </div>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imágen:</label>
            <input type="file" id="imagen" name="imagen" class="form-control">
        </div>

        <div class="mb-3">
            <label for="equipos" class="form-label">Equipos:</label>
            <select name="equipos" id="equipos" class="form-select" required>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $jugador->equipo->id == $equipo->id ? 'selected' : '' }}>{{ $equipo->nombre }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Por favor, seleccione un equipo.
            </div>
        </div>

        <div class="mb-3">
            <label for="coches" class="form-label">Coches: *</label>
            <select name="coches" id="coches" class="form-select" required>
                @foreach($coches as $coche)
                    <option value="{{ $coche->id }}" {{ $jugador->coche->id == $coche->id ? 'selected' : '' }}>{{ $coche->marca }} - {{ $coche->modelo }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Por favor, seleccione un coche.
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block">Editar</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#equipos').select2();
        $('#coches').select2();
    });

    // Bootstrap form validation
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection
