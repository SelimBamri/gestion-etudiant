@extends('layouts.masters')

@section('title', 'Tableau de bord')

@section('content')
      <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Cours</h3>
        <table class="table" style="margin-bottom: 3rem">
            <thead>
                <th>id</th>
                <th>Nom</th>
                <th>Description</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cours->id }}</td>
                    <td>{{ $cours->nom }}</td>
                    <td>{{ $cours->description }}</td>
                </tr>
            </tbody>
        </table>
        <h3 style="margin-bottom: 3rem">Étudiants</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th style="text-align:center;">Nombre d'absences</th>
                <th style="text-align:center;">Note</th>
            </thead>
            <tbody>
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td style="text-align:center;">{{ $etudiant->absences_count }}</td>
                    <td style="text-align:center;">{{ $etudiant->note ?? '-' }}</td>
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