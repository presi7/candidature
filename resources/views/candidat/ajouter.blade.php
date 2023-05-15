@extends('layouts.app')



@section('content')

<div class="conatiner">

    @if (session('success'))
    <div class="alert alert-info mt-5 text-center" style="width: 18rem; margin: auto">
        {{session('success')}}
    </div>
    @endif
    <img src="images/def.JPG" alt="Defarsci" width="100%" height="400" class="d-block mx-auto mt-3 rounded" style=" object-fit: cover;">
    <div class="card my-3 " style="width: 38rem; margin: auto">

        <div class="card-header bg-info text-black fs-5 fw-bold text-center">FORMATION DE STAGE 100% PRATIQUE</div>
        <div class="card-body">
            <form action="{{route('store.candidat')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Adresse Email:</label>
                    <input type="email" name="email" id="email" placeholder="Votre réponse" class="form-control my-3">
                </div>
                <div class="form-group">
                    <label for="">Nom:</label>
                    <input type="text" name="nom" id="" placeholder="Votre réponse" class="form-control my-3">
                </div>

                <div class="form-group">
                    <label for="">Prenom:</label>
                    <input type="text" name="prenom" id="" placeholder="Votre réponse" class="form-control my-3">
                </div>

                <div class="form-group">
                    <label for="">Téléphone</label>
                    <input type="tel" name="telephone" id="" placeholder="Votre réponse" class="form-control my-3">
                </div>

                <div class="form-group">
                    <label for="">Adresse Domicile</label>
                    <input type="text" name="adresse" id="" placeholder="Votre réponse" class="form-control my-3">
                </div>

                <div class="form-group">
                    <label for="">Choisir votre domaine de compétence</label>
                    <select name="domaine" id="" class="form-control my-3">
                        {{-- foreach module --}}
                        @foreach ($module as $modules)
                        <option value="{{ $modules->libele }}">{{  $modules->libele  }}</option>
                        @endforeach

                        {{-- <option value="{{ $modules->ressourceshumaines }}">Ressources Humaines</option>
                        <option value="{{ $modules->marketingdigital }}">Marketing Digital</option>
                        <option value="{{ $modules->gestionprojet}}">Gestion Projet</option>
                        <option value="{{ $modules->informatiquebureautique }}">Informatique Bureautique</option>
                        <option value="{{ $modules->developpementweb }}">Développement Web</option>
                        <option value="{{ $modules->ardino }}">Ardino(Robotique-Internet des objets connectés)</option>
                        <option value="{{ $modules->modelisationimpression3d }}">Modélisation et Impression 3D</option>
                        <option value="{{ $modules->maintenance }}">Maintenance</option>
                        <option value="{{ $modules->mdesigngraphique}}">Design Graphique</option>
                        <option value="{{ $modules->autres }}">Autres</option> --}}
                    </select>


                </div>

                <div class="form-group">
                    <label for="myfile">Télécharger votre CV:</label>
                    <input type="file" id="myfile" name="myfile" accept = "application/pdf" class="form-control my-3">

                </div>

                <div class="form-group">
                    <label for="">Question/Suggestion/Commentaire</label>
                    <input type="text" name="question" id="" placeholder="Votre réponse" class="form-control my-3">
                </div>

                <div class="form-group">
                    <button class="btn btn-info mt-3">Envoyer</button>
                    {{-- <button class="btn text-danger float-end mt-2" >Effacer le formumaire</button> --}}
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
