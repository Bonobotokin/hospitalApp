@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alertDanger">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Danger!</strong> Erreur.

    {{ session('status') }}
</div>
@endif
<!-- <div class="alertSucess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> Bienvenue sur votre champ de travaille.
    </div> -->
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
    </button> Connexion reussit <a href="" class="alert-link"></a>
</div>

<!-- <div class="swal2-container fade in" style="overflow-y: auto;">
    <div class="swal2-modal show-swal2" style="display: block; width: 500px; padding: 20px; background: rgb(255, 255, 255); min-height: 329px;" tabindex="-1">
        <ul class="swal2-progresssteps" style="display: none;"></ul>
        <div class="swal2-icon swal2-error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div>
        <div class="swal2-icon swal2-question" style="display: none;">?</div>
        <div class="swal2-icon swal2-warning" style="display: none;">!</div>
        <div class="swal2-icon swal2-info" style="display: none;">i</div>
        <div class="swal2-icon swal2-success animate" style="display: block;"><span class="line tip animate-success-tip"></span> <span class="line long animate-success-long"></span>
            <div class="placeholder"></div>
            <div class="fix"></div>
        </div><img class="swal2-image" src="img/dialog/like.png" style="display: none;">
        <h2>Good job!</h2>
        <div class="swal2-content" style="display: block;">Lorem ipsum dolor cry sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, Spensaduran pellentesque maximus eniman. Mauriseleifend ex semper, lobortis purus.</div><input style="display: none;" class="swal2-input"><input type="file" style="display: none;" class="swal2-file">
        <div class="swal2-range" style="display: none;"><output></output><input type="range"></div><select style="display: none;" class="swal2-select"></select>
        <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"></label><textarea style="display: none;" class="swal2-textarea"></textarea>
        <div class="swal2-validationerror" style="display: none;"></div>
        <hr class="swal2-spacer" style="display: block;"><button type="button" class="swal2-confirm styled" style="background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button><button type="button" class="swal2-cancel styled" style="display: none; background-color: rgb(170, 170, 170);">Cancel</button><span class="swal2-close" style="display: none;">×</span>
    </div>
</div> -->

@endsection