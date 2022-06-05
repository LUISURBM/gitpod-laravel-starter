@extends('layout')
@section('content')
<!-- Layout wrapper -->
<div class="card">
  <h5 class="card-header">Mascotas </h5> <a href="{{ route('mascota.create')}}" class="btn btn-primary">➕</a>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Género</th>
          <th>Raza</th>
          <th>Especie</th>
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
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('mascota.edit', $esp->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
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