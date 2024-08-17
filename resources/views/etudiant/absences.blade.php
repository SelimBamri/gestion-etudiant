@extends('layouts.mastert')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        <h3 style="margin: 3rem 0">Mes absences</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom de l'étudiant</th>
                <th>Nom du cours</th>
                <th>date</th>
            </thead>
            <tbody>
            @foreach ($absences as $abs)
                <tr>
                    <td>{{ $abs->id }}</td>
                    <td>{{ $abs->cours->nom }}</td>
                    <td>{{ $abs->etudiant->nom }} {{ $abs->etudiant->prenom }}</td>
                    <td>{{ $abs->date }}</td>
                </tr>
            @endforeach
            </tbody>
        
        </table>
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