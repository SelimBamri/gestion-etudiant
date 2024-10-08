@extends('layouts.mastert')

@section('title', 'Tableau de bord')

@section('content')
      <div>
        <h3 style="margin-bottom: 3rem">Mes cours</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom</th>
                <th>Description</th>
            </thead>
            <tbody>
            @foreach ($cours as $cour)
                <tr>
                    <td>{{ $cour->id }}</td>
                    <td>{{ $cour->nom }}</td>
                    <td>{{ $cour->description }}</td>
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