@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        <div class="row">
          <h3 style="margin-bottom: 3rem">Tableau de bord</h3>
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Nombre d'étudiants </h5>
                <h5 class="card-text">{{$nbEtudiant}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Nombre d'enseignants </h5>
                <h5 class="card-text">{{$nbEnseignant}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Nombre de cours </h5>
                <h5 class="card-text">{{$nbCours}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card"></div>
          </div>
          <div class=col-4>
            <div class="card"></div>
          </div>
        </div>
        <div class="row">
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Nombre d'inscriptions </h5>
                <h5 class="card-text">{{$nbInscri}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Inscriptions payées </h5>
                <h5 class="card-text">{{$nbInscriY}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Inscriptions non payées </h5>
                <h5 class="card-text">{{$nbInscriN}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card"></div>
          </div>
          <div class=col-4>
            <div class="card"></div>
          </div>
        </div>
        <div class="row">
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Profit </h5>
                <h5 class="card-text">{{$totalPrix}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> Reçu </h5>
                <h5 class="card-text">{{$totalPrixPaye}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card" style="padding: 1rem">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title"> À recevoir </h5>
                <h5 class="card-text">{{$totalPrixNonPaye}}</h5>
              </div>   
            </div>
          </div>
          <div class=col-4>
            <div class="card"></div>
          </div>
          <div class=col-4>
            <div class="card"></div>
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