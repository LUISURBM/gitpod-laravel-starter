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


<!--Add buttons to initiate auth sequence and sign out-->
<button id="authorize_button" onclick="handleAuthClick()">Authorize</button>
<button id="signout_button" onclick="handleSignoutClick()">Sign Out</button>

<pre id="content" style="white-space: pre-wrap;"></pre>

<script type="text/javascript">
  /* exported gapiLoaded */
  /* exported gisLoaded */
  /* exported handleAuthClick */
  /* exported handleSignoutClick */

  // TODO(developer): Set to client ID and API key from the Developer Console
  const CLIENT_ID = '963354947120-b6ol79tmrd7h5diqe7qduat17hgd6t41.apps.googleusercontent.com';
  const API_KEY = 'AIzaSyCwKYybd0acu1p2KdtBRvNosPMZsO-wkws';

  // Discovery doc URL for APIs used by the quickstart
  const DISCOVERY_DOC = 'https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest';

  // Authorization scopes required by the API; multiple scopes can be
  // included, separated by spaces.
  const SCOPES = 'https://www.googleapis.com/auth/calendar.readonly';

  let tokenClient;
  let gapiInited = false;
  let gisInited = false;

  document.getElementById('authorize_button').style.visibility = 'hidden';
  document.getElementById('signout_button').style.visibility = 'hidden';

  /**
   * Callback after api.js is loaded.
   */
  function gapiLoaded() {
    gapi.load('client', intializeGapiClient);
  }

  /**
   * Callback after the API client is loaded. Loads the
   * discovery doc to initialize the API.
   */
  async function intializeGapiClient() {
    await gapi.client.init({
      apiKey: API_KEY,
      discoveryDocs: [DISCOVERY_DOC],
    });
    gapiInited = true;
    maybeEnableButtons();
  }

  /**
   * Callback after Google Identity Services are loaded.
   */
  function gisLoaded() {
    tokenClient = google.accounts.oauth2.initTokenClient({
      client_id: CLIENT_ID,
      scope: SCOPES,
      callback: '', // defined later
    });
    gisInited = true;
    maybeEnableButtons();
  }

  /**
   * Enables user interaction after all libraries are loaded.
   */
  function maybeEnableButtons() {
    if (gapiInited && gisInited) {
      document.getElementById('authorize_button').style.visibility = 'visible';
    }
  }

  /**
   *  Sign in the user upon button click.
   */
  function handleAuthClick() {
    tokenClient.callback = async (resp) => {
      if (resp.error !== undefined) {
        throw (resp);
      }
      document.getElementById('signout_button').style.visibility = 'visible';
      document.getElementById('authorize_button').innerText = 'Refresh';
      await listUpcomingEvents();
    };

    if (gapi.client.getToken() === null) {
      // Prompt the user to select a Google Account and ask for consent to share their data
      // when establishing a new session.
      tokenClient.requestAccessToken({
        prompt: 'consent'
      });
    } else {
      // Skip display of account chooser and consent dialog for an existing session.
      tokenClient.requestAccessToken({
        prompt: ''
      });
    }
  }

  /**
   *  Sign out the user upon button click.
   */
  function handleSignoutClick() {
    const token = gapi.client.getToken();
    if (token !== null) {
      google.accounts.oauth2.revoke(token.access_token);
      gapi.client.setToken('');
      document.getElementById('content').innerText = '';
      document.getElementById('authorize_button').innerText = 'Authorize';
      document.getElementById('signout_button').style.visibility = 'hidden';
    }
  }

  /**
   * Print the summary and start datetime/date of the next ten events in
   * the authorized user's calendar. If no events are found an
   * appropriate message is printed.
   */
  async function listUpcomingEvents() {
    let response;
    try {
      const request = {
        'calendarId': 'primary',
        'timeMin': (new Date()).toISOString(),
        'showDeleted': false,
        'singleEvents': true,
        'maxResults': 10,
        'orderBy': 'startTime',
      };
      response = await gapi.client.calendar.events.list(request);
    } catch (err) {
      document.getElementById('content').innerText = err.message;
      return;
    }

    const events = response.result.items;
    if (!events || events.length == 0) {
      document.getElementById('content').innerText = 'No events found.';
      return;
    }
    // Flatten to string to display
    const output = events.reduce(
      (str, event) => `${str}${event.summary} (${event.start.dateTime || event.start.date})\n`,
      'Events:\n');
    document.getElementById('content').innerText = output;
  }
</script>
<script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
<script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>
@endsection