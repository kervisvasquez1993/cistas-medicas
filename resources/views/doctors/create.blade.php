
@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Medico</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/specialties')}}" class="btn btn-sm btn-default">
                        Cancelar y Volver
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <div class="card-body">
                @if($errors->any())
                    <ul class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{url('/specialties')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre del médico</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input type="text" name="cedula" class="form-control" value="{{old('cedula')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control" value="{{old('address')}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono / movil</label>
                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">
                        Guardar
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
