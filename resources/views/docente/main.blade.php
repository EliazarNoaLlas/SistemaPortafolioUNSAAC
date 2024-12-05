@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">¡Bienvenido, {{ $nombreDocente ?? 'Nombre del docente' }}!</h1>
@stop

@section('content')
    <div class="container mt-4">
        <!-- Tarjetas resumen -->
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card bg-light shadow-sm">
                    <div class="card-body">
                        <h1 class="text-primary">{{ $portafoliosEnviados ?? 'X' }}%</h1>
                        <p>Portafolios enviados</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light shadow-sm">
                    <div class="card-body">
                        <h1 class="text-warning">{{ $portafoliosRevision ?? 'Y' }}%</h1>
                        <p>Portafolios en revisión</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light shadow-sm">
                    <div class="card-body">
                        <h1 class="text-danger">{{ $observacionesPendientes ?? 'Z' }}</h1>
                        <p>Observaciones pendientes</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carga académica -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5>Carga académica</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Malla Curricular</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cargaAcademica ?? [] as $curso)
                        <tr>
                            <td>{{ $curso->nombre }}</td>
                            <td>{{ $curso->malla }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Sin datos disponibles</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
