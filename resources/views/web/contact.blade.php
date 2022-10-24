@extends('web.layouts.app')

@section('content')

  <div class="contact_container">
    <div class="contact_wrapper">
      <section style="width:100%;height:700px;" class="goolge_map">
        <iframe style="width: 100%; height:100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1436.7665357177746!2d2.4298177925364532!3d48.981853571212156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66afba5df8bcd%3A0x7e0988d72e2b928f!2s31%20Rue%20du%20Professeur%20Esclangon%2C%2095400%20Arnouville%2C%20France!5e0!3m2!1sfr!2stn!4v1629199375667!5m2!1sfr!2stn" allowfullscreen="" loading="lazy"></iframe>
      </section>
      <section class="section_contact">
        <div class="container pt-4 px-4 g-0">
          <h2 style="margin:0; font-weight:800">Contactez-nous</h2>
          <div class="row mt-5 g-5">
            <div class="col-md-6">
              <form class="row g-3" action="">
                <div class="col-md-6">
                  <input class="form-control" type="text" placeholder="Nom et prénom">
                </div>
                <div class="col-md-6">
                  <input class="form-control" placeholder="Nom et prénom">
                </div>
                <div class="col-md-12">
                  <input class="form-control" placeholder="Email">
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" placeholder="Votre message"></textarea>
                </div>
                <div class="col-md-12">
                  <input id="check-box" type="checkbox" class="">
                  <label for="check-box" >j'ai lu et accepté les CGU et la Politique de confidentialité</label>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                <button style="border: none;
                background: red;
                border-radius: 25px;
                color: white;
                padding: 5px 15px;">Envoyez</button>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <ul style="margin:0; padding: 0; display: flex; flex-direction: column; justify-content: center; align-items: center;" class="items">
                <li style="list-style: none; width: 300px;" class="item_list">
                  <h3 style="margin:0; color:#111D5E; font-weight:700">Notre adresse</h3>
                  <p style="color:#111D5E">31 Rue de Professeur Esclangon</p>
                </li>
                <li style="list-style: none; width: 300px;" class="item_list">
                  <h3 style="margin:0; color:#111D5E; font-weight:700">Notre numéro</h3>
                  <p style="color:#111D5E">+33 6 73 46 65 64</p>
                </li>
                <li style="list-style: none; width: 300px;" class="item_list">
                  <h3 style="margin:0; color:#111D5E; font-weight:700">Notre email</h3>
                  <p style="color:#111D5E">votreconseiller@cpn-aide-aux-entreprise.com</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

@endsection