@extends('layout')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Turnos/</span> Activos</h4>

<div class="row">
  <!-- Layout wrapper -->
  <div class="col col-xs-12">
    <div class="card">
      <h5 class="card-header">Mascotas </h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">

            @foreach($mascotas as $esp)
            <tr class="table-default">
              <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> <strong>{{$esp->nombre}}</strong></td>
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
  </div>
  <div class="col-lg-6 col-xs-12">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%237CB342&ctz=America%2FBogota&title=veterinaria-app&src=ZWNiaDBzdHFmcHBrMG81Z3Buc3RoZWZ2YzhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23D50000" style="border:solid 1px #777" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
  </div>
</div>

@endsection