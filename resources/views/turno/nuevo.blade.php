@extends('layout')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Visita/</span> Programar Turno</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">


  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Agendamiento de servicio</h5>
        <small class="text-muted float-end">Puedes búscar una fecha deseada o profesional</small>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('turno.store') }}">

          <div class="row mb-3">
            <div class="input-group">
              @csrf
              <label class="input-group-text" for="mascota_id">Mascota</label>
              <select class="form-select" id="mascota_id" name="mascota_id">
                <option selected disabled>Selecciona la mascota que quieres sea atendida...</option>
                @foreach($mascotas as $esp)
                <option value="{{$esp->id}}">{{$esp->nombre}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-3 ">
            <label for="fecha" class="form-label">Fecha visita</label>
            <input class="form-control" type="datetime-local" value="2022-06-30T08:00" id="fecha" name="fecha" value="{{ $esp->fecha }}" />
          </div>

          <div class="row mb-3">
            <div class="input-group">
              <label class="input-group-text" for="profesional_id">Profesional</label>
              <select class="form-select" id="profesional_id" name="profesional_id">
                <option selected disabled>Selecciona el profesional que quieres que atienda tu mascota...</option>
                @foreach($profesionales as $esp)
                <option value="{{$esp->id}}">{{$esp->nombre}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="input-group">
              <label class="input-group-text" for="servicio_id">Servicio</label>
              <select class="form-select" id="servicio_id" name="servicio_id">
                <option selected disabled>Selecciona el servicio que quieres que atienda tu mascota...</option>
                @foreach($servicios as $esp)
                <option value="{{$esp->id}}">{{$esp->nombre}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Mensaje</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                <textarea id="basic-icon-default-message" observaciones="basic-icon-default-message" class="form-control" placeholder="Escribe el mensaje que leerá el médico al momento de recibir tu turno de visita" aria-label="Escribe el mensaje que leerá el médico al momento de recibir tu turno de visita" aria-describedby="basic-icon-default-message2"></textarea>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>
  <!--/ Calendar -->
  <div class="col-xxl embed-responsive embed-responsive-21by9" style="min-height: 500px">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%237CB342&ctz=America%2FBogota&title=veterinaria-app&src=ZWNiaDBzdHFmcHBrMG81Z3Buc3RoZWZ2YzhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23D50000" style="border:solid 1px #777" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>

  </div>
</div>

@endsection