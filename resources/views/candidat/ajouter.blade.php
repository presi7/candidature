@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-info mt-5 text-center" style="width: 18rem; margin: auto">
        {{ session('success') }}
    </div>
    @endif
    <img src="images/BANIERE.png" alt="Defarsci" class="img-fluid rounded" style="object-fit: cover;">
    <div class="card my-3 mx-auto" style="max-width: 38rem;">
        <div class="card-header text-black fs-5 fw-bold text-center" style="background-color: #85addb">FORMATION DE STAGE 100% PRATIQUE</div>
        <div class="card-body">
            <form action="{{ route('store.candidat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Adresse Email:</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" placeholder="Votre réponse" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nom" class="col-sm-3 col-form-label">Nom:</label>
                    <div class="col-sm-9">
                        <input type="text" name="nom" id="nom" placeholder="Votre réponse" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="prenom" class="col-sm-3 col-form-label">Prenom:</label>
                    <div class="col-sm-9">
                        <input type="text" name="prenom" id="prenom" placeholder="Votre réponse" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telephone" class="col-sm-3 col-form-label">Téléphone</label>
                    <div class="col-sm-9">
                        <input type="tel" name="telephone" id="telephone" placeholder="Votre réponse" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="adresse" class="col-sm-3 col-form-label">Adresse Domicile</label>
                    <div class="col-sm-9">
                        <input type="text" name="adresse" id="adresse" placeholder="Votre réponse" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="domaine" class="col-sm-3 col-form-label">Choisir votre domaine de compétence</label>
                    <div class="col-sm-9">
                        <select name="domaine" id="domaine" class="form-select">
                            @foreach ($module as $modules)
                            <option value="{{ $modules->libele }}">{{ $modules->libele }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="myfile" class="col-sm-3 col-form-label">Télécharger votre CV:</label>
                    <div class="col-sm-9">
                        <input type="file" id="myfile" name="myfile" accept="application/pdf" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="question" class="col-sm-3 col-form-label">Question/Suggestion/Commentaire</label>
                    <div class="col-sm-9">
                        <input type="text" name="question" id="question" placeholder="Votre réponse" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button class="btn" style="background-color: #85addb">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
