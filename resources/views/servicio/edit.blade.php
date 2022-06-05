@extends('layout')
@section('content')
<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div><br />
    @endif
    <form method="post" action="{{ route('servicio.update', $servicio->id) }}">
      <div class="col-md-6">
        <div class="card mb-4">
          <h5 class="card-header">Información de Servicio</h5>
          <div class="card-body">
            <div class="mb-3">
              @csrf
              @method('PATCH')
              <label for="nombre" class="form-label">Nombres</label>
              <input class="form-control" id="nombre" name="nombre" placeholder="Nombres del servicio" value="{{ $servicio->nombre }}" />
            </div>
            <div class="mb-3">
              <label for="id" class="form-label">Código de servicio</label>
              <input class="form-control" type="text" id="id" name="id" placeholder="Código del servicio" readonly value="{{ $servicio->id }}" />
            </div>
            <div class="mb-3">
              <label for="id" class="form-label">Duracion en minutos</label>
              <input class="form-control" type="text" id="duracion_minutos" name="duracion_minutos" placeholder="Duración en minutos" value="{{ $servicio->duracion_minutos }}" />
            </div>
            <div class="mb-3 ">
              <label for="fecha" class="form-label">Fecha</label>
              <input class="form-control" type="date" id="fecha" name="fecha" value="{{ $servicio->fecha }}" />
            </div>
            <div class="mb-3 ">
              <label for="incapacidad_dias" class="form-label">Incapacidad días</label>
              <input class="form-control" type="number" id="incapacidad_dias" name="incapacidad_dias" value="{{ $servicio->incapacidad_dias }}" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="valor_total">Valor Total</label>
              <input class="form-control" type="number" id="valor_total" name="valor_total" value="{{ $servicio->valor_total }}" />
            </div>

            <div class="row mb-3">
              <div class="input-group">
                <label class="input-group-text" for="sala_id">Sala</label>
                <select class="form-select" id="sala_id">
                  <option selected disabled>Selecciona la sala que quieres sea atendida...</option>
                  @foreach($salas as $esp)
                  <option value="{{$esp->id}}">{{$esp->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Editar</button>
      </div>
    </form>
  </div>
</div>
@endsection