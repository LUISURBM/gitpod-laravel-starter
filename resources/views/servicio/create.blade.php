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
    <form method="post" action="{{ route('mascota.store') }}">
      <div class="col-md-6">
        <div class="card mb-4">
          <h5 class="card-header">Información de Mascota</h5>
          <div class="card-body">
            <div class="mb-3">
              @csrf
              <label for="nombre" class="form-label">Nombres</label>
              <input class="form-control" id="nombre" name="nombre" placeholder="Los nombres de tu mascota"  />
            </div>
            <div class="mb-3 ">
              <label for="nacimiento" class="form-label">Fecha nacimiento</label>
              <input class="form-control" type="date" value="2021-06-18" id="nacimiento" name="nacimiento" />
            </div>
            <div class="mb-3 ">
              <label for="adquisicion" class="form-label">Fecha adquisición</label>
              <input class="form-control" type="date" value="2021-06-18" id="adquisicion" name="adquisicion" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="color">Color</label>
              <input class="form-control" type="color" id="color" name="color" />
            </div>
            <div class="mb-3">
              <label for="especie" class="form-label">Especie</label>
              <select class="form-select" id="especie" name="especie_id" aria-label="Default select example" >
                <option value="0"> -- Selecciona la especie de tu mascota -- </option>
                <option value="1">Mamiferos</option>
                <option value="2">Aves</option>
                <option value="3">Reptiles</option>
                <option value="4">Ranas y sapos</option>
                <option value="5">Peces</option>
                <option value="6">Ciempiés y milpiés</option>
                <option value="7">Arañas y alacranes</option>
                <option value="8">Insectos</option>
                <option value="9">Cangrejos y camarones</option>
                <option value="10">Estrellas y erizos</option>
                <option value="11">Caracoles, almejas y pulpos</option>
                <option value="12">Lombrices y gusanos marinos</option>
                <option value="13">Rotíferos</option>
                <option value="14">Gusanos planos</option>
                <option value="15">Medusas y corales</option>
                <option value="16">Esponjas</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleDataList" class="form-label">Raza</label>
              <input class="form-control" list="razaOptions" id="exampleDataList" name="raza_id" placeholder="Selecciona la raza de tu mascota"  />
              <datalist id="razaOptions">
                <option value="1 ~ Sirenia (manatíes y dugongos)" >Sirenia (manatíes y dugongos)</option>
                <option value="2 ~ Cingulata (armadillos)" >Cingulata (armadillos)</option>
                <option value="3 ~ Pilosa (osos hormigueros, perezosos y tamanduas)" >Pilosa (osos hormigueros, perezosos y tamanduas)</option>
                <option value="4 ~ Primates" >Primates</option>
                <option value="5 ~ Rodentia (roedores)" >Rodentia (roedores)</option>
                <option value="6 ~ Lagomorpha (lagomorfos)" >Lagomorpha (lagomorfos)</option>
                <option value="7 ~ Chiroptera (murciélagos)" >Chiroptera (murciélagos)</option>
                <option value="8 ~ Cetacea (ballenas y delfines)" >Cetacea (ballenas y delfines)</option>
                <option value="9 ~ Carnivora (carnívoros)" >Carnivora (carnívoros)</option>
                <option value="10 ~ Eulipotyphla (erizos, gimnuros, topos, musarañas, desmanes y solenodontes.)" >Eulipotyphla (erizos, gimnuros, topos, musarañas, desmanes y solenodontes.)</option>
                <option value="11 ~ Perissodactyla (ungulados con número impar de pezuñas)" >Perissodactyla (ungulados con número impar de pezuñas)</option>
                <option value="12 ~ Artiodactyla (ungulados con número par de pezuñas)" >Artiodactyla (ungulados con número par de pezuñas)</option>
                <option value="13 ~ Didelphimorphia (zarigüeyas comunes)" >Didelphimorphia (zarigüeyas comunes)</option>
                <option value="14 ~ Paucituberculata (zarigüeyas musaraña)" >Paucituberculata (zarigüeyas musaraña)</option>
              </datalist>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect2" class="form-label">Género</label>
              <select multiple class="form-select" id="exampleFormControlSelect2" name="genero_id" aria-label="Multiple select example" >
                <option>-- Selecciona el género de tu mascota --</option>
                <option value="1 ~ Femenino">Femenino</option>
                <option value="2 ~ Masculino">Masculino</option>
              </select>
            </div>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="esterilizado" name="esterilizado"  />
              <label class="form-check-label" for="esterilizado">Esterilización</label>
            </div>
            <div>
              <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="obervaciones" rows="3"></textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Editar</button>
      </div>
    </form>
  </div>
</div>
@endsection