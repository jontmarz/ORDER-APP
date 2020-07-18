@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>
<div id="app" class="content">
    <control-component></control-component>
</div>
<script src="{{asset('js/app.js')}}"></script>
<div class="container">
    <footer id="footer">
        <h4>Jon Tmarz <sup>TM</sup> | Todos los derechos reservados<sup>&copy;</sup></h4>
    </footer>
</div>
@endsection
