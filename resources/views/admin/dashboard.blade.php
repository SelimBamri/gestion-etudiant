@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        <div class="row">
          
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