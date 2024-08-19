@extends('layouts.mastert')

@section('title', 'Tableau de bord')

@section('content')
      <div>
        <h3 style="margin-bottom: 3rem">Mon compte</h3>
        <div class="card" style="padding-left: 10rem">
            <div class="row card-body">
                <div class="col-6">
                    <h5 style="color:black; margin-top: 2rem">Adresse email</h5>
                    <h6>{{auth()->user()->email}}</h6>

                    <h5 style="color:black; margin-top: 2rem">Nom complet</h5>
                    <h6>{{auth()->user()->nom}} {{auth()->user()->prenom}}</h6>
                    

                    <h5 style="color:black; margin-top: 2rem">Date de naissance</h5>
                    <h6>{{auth()->user()->date_de_naissance}}</h6>
                    
                </div>
                <div class="col-6">
                    <h5 style="color:black; margin-top: 2rem">Numéro de téléphone</h5>
                    <h6>{{auth()->user()->telephone}}</h6>

                    <h5 style="color:black; margin-top: 2rem">Adresse</h5>
                    <h6>{{auth()->user()->adresse}}</h6>

                    <h5 style="color:black; margin-top: 2rem">Mot de passe</h5>
                    <h6>****</h6>
                </div>
            </div>
        </div>
      </div>
@endsection 
@section('scripts')

  <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/index.js') }}"></script>
  <script src="{{ URL::asset('build/plugins/peity/jquery.peity.min.js') }}"></script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
@endsection 