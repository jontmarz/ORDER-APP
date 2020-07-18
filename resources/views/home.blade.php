@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order App</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="nombre" name="name">
                        </div>
                        <div class="buttons">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button class="btn btn-danger">Borrar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body"></div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection
