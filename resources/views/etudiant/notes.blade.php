@extends('layouts.mastert')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin: 3rem 0">Mes notes</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom de l'étudiant</th>
                <th>Nom du cours</th>
                <th>Note</th>
            </thead>
            <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->cours->nom }}</td>
                    <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                    <td>{{ $note->note }}</td>
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