@extends('layouts.masters')

@section('title', 'Tableau de bord')

@section('content')
        
    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Modifier une note</h3>
        <form action="{{ route('note.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div class="col-4" style='margin-bottom: 1rem;'>
                    <input type="text" class="form-control" name="cours" placeholder="Id du cours" value= "{{$note->cours->id}}" required>
                </div>
                <div class="col-4" style='margin-bottom: 1rem;'>
                    <input type="email" class="form-control" name="email" placeholder="Email de l'étudiant" value="{{$note->etudiant->email}}" required>
                </div>
                <div class="col-4" style='margin-bottom: 1rem;'>
                    <input type="number" class="form-control" name="note" placeholder="Note attribuée" value="{{$note->note}}" required>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Modifier la note</button>
                </div>
                </div>
            </div>
        </form>
        @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 1rem">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
        @endif  
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