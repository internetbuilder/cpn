@extends('web.layouts.app')

@section('content')

  <div class="calendar_container">
    <div class="calendar_wrapper">
      <div class="container pt-4 px-4 g-0">
        <div class="calendar_info">
          <div class="row g-0 justify-content-center mb-3">
            <div class="col-auto">
              <div class="row justify-content-center">
                <div class="col-auto">
                  <div class="info_title d-flex flex-row">
                    <h1 class="info_text">Vous n'êtes pas disponible</h1>
                    <div class="info_bull">?</div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-auto">
                  <p class="info_desc">Aucun problème, programmer votre rendez-vous.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="calendar" id='calendar'></div>
      </div>
    </div>
  </div>
  <script src="{{asset('js/calendar.js')}}"></script>
@endsection