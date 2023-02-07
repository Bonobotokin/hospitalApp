@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alertDanger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Danger!</strong> Erreur.

            {{ session('status') }}
        </div>
    @endif
    <div class="alertSucess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> Bienvenue sur votre champ de travaille.
    </div>
    
@endsection
