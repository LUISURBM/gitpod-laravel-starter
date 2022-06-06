@extends('layout')
@section('content')
<!-- Layout wrapper -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Consulta /</span> Atender Consulta del turno</h4>

<div class="card">
  <h5 class="card-header">Turnos </h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Género</th>
          <th>Raza</th>
          <th>Especie</th>
          <th>Hora</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

        @foreach($mascotas as $esp)
        <tr class="table-default">
          <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> <strong>{{$esp->nombre}}</strong></td>
          <td>{{$esp->genero}}</td>
          <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="pull-up" title="{{$esp->raza}}">
                {{$esp->raza}}
              </li>
            </ul>
          </td>
          <td><span class="badge bg-label-primary me-1">{{$esp->especie}}</span></td>
          <td><span class="badge bg-label-primary me-1">{{$esp->fecha}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('consulta.edit', encrypt($esp->turno_id)) }}"><i class="bx bx-edit-alt me-1"></i> Atender</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Rechazar</a>
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