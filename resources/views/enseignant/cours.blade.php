@extends('layouts.masters')

@section('title', 'Tableau de bord')

@section('content')
      <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Mes cours</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($cours as $cour)
                <tr>
                    <td>{{ $cour->id }}</td>
                    <td>{{ $cour->nom }}</td>
                    <td>{{ $cour->description }}</td>
                    <td><a href="{{ route('enseignant.cours.det', $cour->id) }}"> <i class="material-icons-outlined">info</i></a></td>
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