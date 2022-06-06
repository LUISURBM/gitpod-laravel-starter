@extends('layout')
@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Consulta /</span> Atender Consulta</h4>

<div class="row">
  <!-- Basic -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Basic</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">

        <form method="post" action="{{ route('consulta.buscar') }}">
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
            <input class="form-control" list="razaOptions" id="exampleDataList" name="raza_id" placeholder="Selecciona la raza de tu mascota" value="{{ $mascota->raza_id }}" />
            <datalist id="razaOptions">
              <option value="1" {{ ( $mascota->raza_id == 1) ? 'selected' : '' }}>Sirenia (manatíes y dugongos)</option>
              <option value="2" {{ ( $mascota->raza_id == 2) ? 'selected' : '' }}>Cingulata (armadillos)</option>
              <option value="3" {{ ( $mascota->raza_id == 3) ? 'selected' : '' }}>Pilosa (osos hormigueros, perezosos y tamanduas)</option>
              <option value="4" {{ ( $mascota->raza_id == 4) ? 'selected' : '' }}>Primates</option>
              <option value="5" {{ ( $mascota->raza_id == 5) ? 'selected' : '' }}>Rodentia (roedores)</option>
              <option value="6" {{ ( $mascota->raza_id == 6) ? 'selected' : '' }}>Lagomorpha (lagomorfos)</option>
              <option value="7" {{ ( $mascota->raza_id == 7) ? 'selected' : '' }}>Chiroptera (murciélagos)</option>
              <option value="8" {{ ( $mascota->raza_id == 8) ? 'selected' : '' }}>Cetacea (ballenas y delfines)</option>
              <option value="9" {{ ( $mascota->raza_id == 9) ? 'selected' : '' }}>Carnivora (carnívoros)</option>
              <option value="10" {{ ( $mascota->raza_id == 10) ? 'selected' : '' }}>Eulipotyphla (erizos, gimnuros, topos, musarañas, desmanes y solenodontes.)</option>
              <option value="11" {{ ( $mascota->raza_id == 11) ? 'selected' : '' }}>Perissodactyla (ungulados con número impar de pezuñas)</option>
              <option value="12" {{ ( $mascota->raza_id == 12) ? 'selected' : '' }}>Artiodactyla (ungulados con número par de pezuñas)</option>
              <option value="13" {{ ( $mascota->raza_id == 13) ? 'selected' : '' }}>Didelphimorphia (zarigüeyas comunes)</option>
              <option value="14" {{ ( $mascota->raza_id == 14) ? 'selected' : '' }}>Paucituberculata (zarigüeyas musaraña)</option>
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
            <input class="form-check-input" type="checkbox" id="esterilizado" name="esterilizado" value="{{ $mascota->esterilizado }}" {{ ($mascota->esterilizado) ? 'checked' : '' }} />
            <label class="form-check-label" for="esterilizado">Esterilización</label>
          </div>
          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="obervaciones" rows="3">{{ $mascota->obervaciones }}</textarea>
          </div>

          <div class="input-group">
            <span class="input-group-text" id="basic-addon11">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon11" />
          </div>

          <div class="form-password-toggle">
            <label class="form-label" for="basic-default-password12">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="basic-default-password12" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password2" />
              <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>

          <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon13" />
            <span class="input-group-text" id="basic-addon13">@example.com</span>
          </div>

          <div class="input-group">
            <span class="input-group-text" id="basic-addon14">https://example.com/users/</span>
            <input type="text" class="form-control" placeholder="URL" id="basic-url1" aria-describedby="basic-addon14" />
          </div>

          <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" placeholder="Amount" aria-label="Amount (to the nearest dollar)" />
            <span class="input-group-text">.00</span>
          </div>

          <div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea class="form-control" aria-label="With textarea" placeholder="Comment"></textarea>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Merged -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Merged</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="input-group input-group-merge">
          <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
          <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
        </div>

        <div class="form-password-toggle">
          <label class="form-label" for="basic-default-password32">Password</label>
          <div class="input-group input-group-merge">
            <input type="password" class="form-control" id="basic-default-password32" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" />
            <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
          </div>
        </div>

        <div class="input-group input-group-merge">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon33" />
          <span class="input-group-text" id="basic-addon33">@example.com</span>
        </div>

        <div class="input-group input-group-merge">
          <span class="input-group-text" id="basic-addon34">https://example.com/users/</span>
          <input type="text" class="form-control" id="basic-url3" aria-describedby="basic-addon34" />
        </div>

        <div class="input-group input-group-merge">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" />
          <span class="input-group-text">.00</span>
        </div>

        <div class="input-group input-group-merge">
          <span class="input-group-text">With textarea</span>
          <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
      </div>
    </div>
  </div>

  <!-- Sizing -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Sizing</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="input-group input-group-lg">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="Username" />
        </div>

        <div class="input-group">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="Username" />
        </div>

        <div class="input-group input-group-sm">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="Username" />
        </div>
      </div>
    </div>
  </div>
  <!-- Checkbox and radio addons -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Checkbox and radio addons</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="input-group">
          <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input" />
          </div>
          <input type="text" class="form-control" aria-label="Text input with checkbox" />
        </div>

        <div class="input-group">
          <div class="input-group-text">
            <input class="form-check-input mt-0" type="radio" value="" aria-label="Radio button for following text input" />
          </div>
          <input type="text" class="form-control" aria-label="Text input with radio button" />
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Multiple inputs & addon -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Multiple inputs & addon</h5>

      <div class="card-body demo-vertical-spacing demo-only-element">
        <small class="text-light fw-semibold d-block">Multiple inputs</small>
        <div class="input-group">
          <span class="input-group-text">First and last name</span>
          <input type="text" aria-label="First name" class="form-control" />
          <input type="text" aria-label="Last name" class="form-control" />
        </div>

        <small class="text-light fw-semibold d-block pt-3">Multiple addons</small>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <span class="input-group-text">0.00</span>
          <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" />
        </div>

        <div class="input-group">
          <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" />
          <span class="input-group-text">$</span>
          <span class="input-group-text">0.00</span>
        </div>
      </div>
    </div>
  </div>
  <!-- Speech To Text -->
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Speech To Text</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <small class="text-light fw-semibold d-block">Input Group</small>

        <div class="input-group input-group-merge speech-to-text">
          <input type="text" class="form-control" placeholder="Say it" aria-describedby="text-to-speech-addon" />
          <span class="input-group-text" id="text-to-speech-addon">
            <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
          </span>
        </div>

        <small class="text-light fw-semibold d-block pt-3">Textarea</small>

        <div class="input-group input-group-merge speech-to-text">
          <textarea class="form-control" placeholder="Say it" rows="2"></textarea>
          <span class="input-group-text">
            <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Button with dropdowns & addons -->
<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Button with dropdowns & addons</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <small class="text-light fw-semibold d-block">Button addons</small>
        <div class="input-group">
          <button class="btn btn-outline-primary" type="button" id="button-addon1">Button</button>
          <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" />
        </div>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" />
          <button class="btn btn-outline-primary" type="button" id="button-addon2">Button</button>
        </div>

        <div class="input-group">
          <button class="btn btn-outline-primary" type="button">Button</button>
          <button class="btn btn-outline-primary" type="button">Button</button>
          <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons" />
        </div>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username with two button addons" />
          <button class="btn btn-outline-primary" type="button">Button</button>
          <button class="btn btn-outline-primary" type="button">Button</button>
        </div>

        <small class="text-light fw-semibold d-block pt-3">Button with dropdowns</small>
        <div class="input-group">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
          </ul>
          <input type="text" class="form-control" aria-label="Text input with dropdown button" />
        </div>

        <div class="input-group">
          <input type="text" class="form-control" aria-label="Text input with dropdown button" />
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
          </ul>
        </div>

        <div class="input-group">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">Action before</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Another action before</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
          </ul>
          <input type="text" class="form-control" aria-label="Text input with 2 dropdown buttons" />
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <!-- Segmented buttons -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <h5 class="card-header">Segmented buttons</h5>
          <div class="card-body demo-vertical-spacing demo-only-element">
            <div class="input-group">
              <button type="button" class="btn btn-outline-primary">Action</button>
              <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
              </ul>
              <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" />
            </div>

            <div class="input-group">
              <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" />
              <button type="button" class="btn btn-outline-primary">Action</button>
              <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Custom select -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <h5 class="card-header">Custom select</h5>
          <div class="card-body demo-vertical-spacing demo-only-element">
            <div class="input-group">
              <label class="input-group-text" for="inputGroupSelect01">Options</label>
              <select class="form-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>

            <div class="input-group">
              <select class="form-select" id="inputGroupSelect02">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>

            <div class="input-group">
              <button class="btn btn-outline-primary" type="button">Button</button>
              <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>

            <div class="input-group">
              <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <button class="btn btn-outline-primary" type="button">Button</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Custom file input -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Custom file input</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <div class="input-group">
          <label class="input-group-text" for="inputGroupFile01">Upload</label>
          <input type="file" class="form-control" id="inputGroupFile01" />
        </div>

        <div class="input-group">
          <input type="file" class="form-control" id="inputGroupFile02" />
          <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>

        <div class="input-group">
          <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon03">Button</button>
          <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" />
        </div>

        <div class="input-group">
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
          <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Button</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection