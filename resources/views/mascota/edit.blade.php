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
    <form method="post" action="{{ route('mascota.update', $mascota->id) }}">
      <div class="col-md-6">
        <div class="card mb-4">
          <h5 class="card-header">Información de Mascota</h5>
          <div class="card-body">
            <div class="mb-3">
              @csrf
              @method('PATCH')
              <label for="nombre" class="form-label">Nombres</label>
              <input class="form-control" id="nombre" name="nombre" placeholder="Los nombres de tu mascota" value="{{ $mascota->nombre }}" />
            </div>
            <div class="mb-3">
              <label for="id" class="form-label">Código interno</label>
              <input class="form-control" type="text" id="id" name="id" placeholder="Código interno asignado por la clínica" readonly value="{{ $mascota->id }}" />
            </div>
            <div class="mb-3 ">
              <label for="nacimiento" class="form-label">Fecha nacimiento</label>
              <input class="form-control" type="date" value="2021-06-18" id="nacimiento" name="nacimiento" value="{{ $mascota->nacimiento }}" />
            </div>
            <div class="mb-3 ">
              <label for="adquisicion" class="form-label">Fecha adquisición</label>
              <input class="form-control" type="date" value="2021-06-18" id="adquisicion" name="adquisicion" value="{{ $mascota->adquisicion }}" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="color">Color</label>
              <input class="form-control" type="color" id="color" name="color" value="{{ $mascota->color }}" />
            </div>
            <div class="mb-3">
              <label for="especie" class="form-label">Especie</label>
              <select class="form-select" id="especie" name="especie_id" aria-label="Default select example" value="{{$mascota->especie_id}}">
                <option value="0" {{ ( $mascota->especie_id == 0) ? 'selected' : '' }}> -- Selecciona la especie de tu mascota -- </option>
                <option value="1" {{ ( $mascota->especie_id == 1) ? 'selected' : '' }}>Mamiferos</option>
                <option value="2" {{ ( $mascota->especie_id == 2) ? 'selected' : '' }}>Aves</option>
                <option value="3" {{ ( $mascota->especie_id == 3) ? 'selected' : '' }}>Reptiles</option>
                <option value="4" {{ ( $mascota->especie_id == 4) ? 'selected' : '' }}>Ranas y sapos</option>
                <option value="5" {{ ( $mascota->especie_id == 5) ? 'selected' : '' }}>Peces</option>
                <option value="6" {{ ( $mascota->especie_id == 6) ? 'selected' : '' }}>Ciempiés y milpiés</option>
                <option value="7" {{ ( $mascota->especie_id == 7) ? 'selected' : '' }}>Arañas y alacranes</option>
                <option value="8" {{ ( $mascota->especie_id == 8) ? 'selected' : '' }}>Insectos</option>
                <option value="9" {{ ( $mascota->especie_id == 9) ? 'selected' : '' }}>Cangrejos y camarones</option>
                <option value="10" {{ ( $mascota->especie_id == 10) ? 'selected' : '' }}>Estrellas y erizos</option>
                <option value="11" {{ ( $mascota->especie_id == 11) ? 'selected' : '' }}>Caracoles, almejas y pulpos</option>
                <option value="12" {{ ( $mascota->especie_id == 12) ? 'selected' : '' }}>Lombrices y gusanos marinos</option>
                <option value="13" {{ ( $mascota->especie_id == 13) ? 'selected' : '' }}>Rotíferos</option>
                <option value="14" {{ ( $mascota->especie_id == 14) ? 'selected' : '' }}>Gusanos planos</option>
                <option value="15" {{ ( $mascota->especie_id == 15) ? 'selected' : '' }}>Medusas y corales</option>
                <option value="16" {{ ( $mascota->especie_id == 16) ? 'selected' : '' }}>Esponjas</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleDataList" class="form-label">Raza</label>
              <input class="form-control" list="razaOptions" id="exampleDataList" name="raza_id" placeholder="Selecciona la raza de tu mascota" value="{{ $mascota->raza }}" />
              <datalist id="razaOptions">
                <option value="1 ~ Sirenia (manatíes y dugongos)" {{ ( $mascota->raza_id == 1) ? 'selected' : '' }}>Sirenia (manatíes y dugongos)</option>
                <option value="2 ~ Cingulata (armadillos)" {{ ( $mascota->raza_id == 2) ? 'selected' : '' }}>Cingulata (armadillos)</option>
                <option value="3 ~ Pilosa (osos hormigueros, perezosos y tamanduas)" {{ ( $mascota->raza_id == 3) ? 'selected' : '' }}>Pilosa (osos hormigueros, perezosos y tamanduas)</option>
                <option value="4 ~ Primates" {{ ( $mascota->raza_id == 4) ? 'selected' : '' }}>Primates</option>
                <option value="5 ~ Rodentia (roedores)" {{ ( $mascota->raza_id == 5) ? 'selected' : '' }}>Rodentia (roedores)</option>
                <option value="6 ~ Lagomorpha (lagomorfos)" {{ ( $mascota->raza_id == 6) ? 'selected' : '' }}>Lagomorpha (lagomorfos)</option>
                <option value="7 ~ Chiroptera (murciélagos)" {{ ( $mascota->raza_id == 7) ? 'selected' : '' }}>Chiroptera (murciélagos)</option>
                <option value="8 ~ Cetacea (ballenas y delfines)" {{ ( $mascota->raza_id == 8) ? 'selected' : '' }}>Cetacea (ballenas y delfines)</option>
                <option value="9 ~ Carnivora (carnívoros)" {{ ( $mascota->raza_id == 9) ? 'selected' : '' }}>Carnivora (carnívoros)</option>
                <option value="10 ~ Eulipotyphla (erizos, gimnuros, topos, musarañas, desmanes y solenodontes.)" {{ ( $mascota->raza_id == 10) ? 'selected' : '' }}>Eulipotyphla (erizos, gimnuros, topos, musarañas, desmanes y solenodontes.)</option>
                <option value="11 ~ Perissodactyla (ungulados con número impar de pezuñas)" {{ ( $mascota->raza_id == 11) ? 'selected' : '' }}>Perissodactyla (ungulados con número impar de pezuñas)</option>
                <option value="12 ~ Artiodactyla (ungulados con número par de pezuñas)" {{ ( $mascota->raza_id == 12) ? 'selected' : '' }}>Artiodactyla (ungulados con número par de pezuñas)</option>
                <option value="13 ~ Didelphimorphia (zarigüeyas comunes)" {{ ( $mascota->raza_id == 13) ? 'selected' : '' }}>Didelphimorphia (zarigüeyas comunes)</option>
                <option value="14 ~ Paucituberculata (zarigüeyas musaraña)" {{ ( $mascota->raza_id == 14) ? 'selected' : '' }}>Paucituberculata (zarigüeyas musaraña)</option>
              </datalist>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect2" class="form-label">Género</label>
              <select multiple class="form-select" id="exampleFormControlSelect2" name="genero_id" aria-label="Multiple select example" value="{{ $mascota->genero }}">
                <option>-- Selecciona el género de tu mascota --</option>
                <option value="1 ~ Femenino" {{ ( $mascota->genero_id == 1) ? 'selected' : '' }}>Femenino</option>
                <option value="2 ~ Masculino" {{ ( $mascota->genero_id == 2) ? 'selected' : '' }}>Masculino</option>
              </select>
            </div>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="esterilizado" name="esterilizado" value="{{ $mascota->esterilizado }}" {{ ( $mascota->esterilizado) ? 'checked' : '' }} />
              <label class="form-check-label" for="esterilizado">Esterilización</label>
            </div>
            <div>
              <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="obervaciones" rows="3">{{ $mascota->obervaciones }}</textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Editar</button>
      </div>
    </form>
  </div>
</div>
@endsection