@extends('layout')
@section('content')
<!-- Layout wrapper -->
<div class="card">
  <h5 class="card-header">Servicios </h5> <a href="{{ route('servicio.create')}}" class="btn btn-primary">➕</a>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Inicio</th>
          <th>Duracion(m)</th>
          <th>Incapacidad</th>
          <th>Valor</th>
          <th>Sala</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

        @foreach($servicios as $esp)
        <tr class="table-default">
          <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> <strong>{{$esp->nombre}}</strong></td>
          <td>{{$esp->fecha}}</td>
          <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="pull-up" title="{{$esp->duracion_minutos}}">
                {{$esp->duracion_minutos}}
              </li>
            </ul>
          </td>
          <td><span class="badge bg-label-primary me-1">{{$esp->incapacidad_dias}}</span></td>
          <td><span class="badge bg-label-primary me-1">{{$esp->valor_total}}</span></td>
          <td><span class="badge bg-label-primary me-1">{{$esp->sala_id}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('servicio.edit', $esp->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection