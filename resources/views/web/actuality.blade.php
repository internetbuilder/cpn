@extends('web.layouts.app')

@section('content')

  <div class="actuality_container">
    <div class="actuality_wrapper">
      <div class="container pt-4 px-4 g-0">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="row mb-3 justify-content-center">
              <div class="col-auto">
                <h1 style="font-weight: bold; color: rgb(33, 7, 94)" class="m-0">
                  Actualité
                </h1>
              </div>
            </div>
            <div class="row mb-5 g-4 justify-content-center">
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div style="overflow: hidden" class="act-wrapper shadow rounded-3 bg-white" >
                  <div style="height: 230px;" class="act-img">
                    <img style="width: 100%; height:100%; object-fit:cover" src="https://bubblemeeting.net/blog/wp-content/uploads/2020/07/people-meeting-brainstorming-blueprint-design-P47QQG6.jpg" alt="" />
                  </div>
                  <div style="height: 190px;" class="act-content p-2">
                    <div class="act-title">
                      <h5> Numériser votre entreprise n'a jamais été aussi simple ! </h5>
                    </div>
                    <div class="act-desc">
                      <p class="m-0"> Nous sommes depuis quelques années rentré dans l'ére du digital... </p>
                    </div>
                    <div class="act-button d-flex flex-row justify-content-end">
                      <button style="border: none; background: transparent">
                        Lire la suite..
                      </button>
                    </div>
                    <span style="border-left: 2px solid black; padding-left: 10px"
                      >25 Février</span >
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div style="overflow: hidden" class="act-wrapper shadow rounded-3 bg-white" >
                  <div style="height: 190px;" class="act-content p-2">
                    <div class="act-title">
                      <h5>
                        Numériser votre entreprise n'a jamais été aussi simple !
                      </h5>
                    </div>
                    <div class="act-desc">
                      <p class="m-0">
                        Nous sommes depuis quelques années rentré dans l'ére du digital...
                      </p>
                    </div>
                    <div class="act-button d-flex flex-row justify-content-end">
                      <button style="border: none; background: transparent">
                        Lire la suite..
                      </button>
                    </div>
                    <span style="border-left: 2px solid black; padding-left: 10px"
                      >25 Février</span>
                  </div>
                  <div style="height: 230px;" class="act-img">
                    <img style="width: 100%; height:100%; object-fit:cover" src="https://bubblemeeting.net/blog/wp-content/uploads/2020/07/people-meeting-brainstorming-blueprint-design-P47QQG6.jpg" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div style="overflow: hidden" class="act-wrapper rounded-3 shadow bg-white" >
                  <div style="height: 230px;" class="act-img">
                    <img style="width: 100%; height:100%; object-fit:cover" src="https://bubblemeeting.net/blog/wp-content/uploads/2020/07/people-meeting-brainstorming-blueprint-design-P47QQG6.jpg" alt="" />
                  </div>
                  <div style="height: 190px;" class="act-content p-2">
                    <div class="act-title">
                      <h5> Numériser votre entreprise n'a jamais été aussi simple ! </h5>
                    </div>
                    <div class="act-desc">
                      <p class="m-0"> Nous sommes depuis quelques années rentré dans l'ére du digital... </p>
                    </div>
                    <div class="act-button d-flex flex-row justify-content-end">
                      <button style="border: none; background: transparent"> Lire la suite.. </button>
                    </div>
                    <span style="border-left: 2px solid black; padding-left: 10px" >25 Février</span >
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mb-5">
              <div class="col-md-12">
                <div class="row justify-content-start">
                  <div class="col-auto">
                    <h4 style="font-weight: 700" class="m-0">Autre actualité</h4>
                  </div>
                  <div class="col-auto">
                    <div class="button-wrapper">
                      <button class="btn btn-left"></button>
                      <button class="btn btn-right"></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection