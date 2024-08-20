@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Ajouter un administrateur</h3>
        <form action="{{ route('admin.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control" name="login" placeholder="Login" required>
                </div>
                <div class="col-4">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Ajouter un admin</button>
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
        <h3 style="margin: 3rem 0">Liste des administrateurs</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Login</th>
                <th>Mot de passe</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->login }}</td>
                    <td>********</td>
                    <td>
                        <form action="{{ route('admin.delete', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:red">
                                <i class="material-icons-outlined">delete</i>
                            </button>
                        </form>
                    </td>
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