@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">


   <div class="container">
    <div class="row my-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Ajouter un nouveau module</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-outline-primary" href="{{ route('liste.module') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oups! </strong> Il y a eu des problèmes avec votre entrée.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('store.module') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Libelé :</strong>
                    <input type="text" name="libele" class="form-control mt-3" placeholder="Saisir le module">
                </div>
            </div>
        </div>
            {{-- <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control my-2"></textarea>
                        <!-- <input type="text" name="description" class="form-control" > -->
                    </div>
                </div>
            </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" class="btn my-5" style="background-color:#85addb">Soumettre</button>
        </div>
    </form>
   </div>
</div>
@endsection
