@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alertDanger">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Danger!</strong> Erreur.

    {{ session('status') }}
</div>
@endif

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
    </button> Connexion reussit <a href="" class="alert-link"></a>
</div>

@endsection