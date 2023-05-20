@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex mt-3 justify-content-center align-items-center mx-3">
        <div class="badge text-wrap"><h2 class="text-black fs-6">Total</h2> <div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $total}}</p></div></div>
    </div>
    <div class="d-flex mt-3 justify-content-center align-items-center mx-3">
        <div class="badge text-wrap"><h2 class="text-black fs-6">RH</h2> <div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{$rh}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">MD</h2> <div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $md}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">GP</h2><div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $gp}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">IB</h2> <div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $ib}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">DW</h2> <div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $dw}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">Ar</h2><div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $ard}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">M3 </h2><div class="border-info-info bg-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $mi}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">Mt </h2><div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $maint}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">DG</h2> <div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $dg}}</p></div></div>
        <div class="badge text-wrap"><h2 class="text-black fs-6">Au </h2><div class="border-info bg-info rounded-circle" style="width: 50px; height: 50px; margin:auto"><p class="text-black" style="font-size:24px; padding:10px">{{ $other}}</p></div></div>
    </div>

    <div class="card mt-5">
        <div class="card-header bg-info text-black">Liste des Candidats</div>
        <div class="card-body table-responsive">
            <table class="table" style="width: 100%;">
                <tr>
                    <th>#</th>
                    <th>Adresse Email</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse Domicile</th>
                    <th>Domaine Competence</th>
                    <th>Actions</th>
                </tr>
                @foreach ($candidat as $candidats)
                <tr>
                    <td>{{ $candidats->id }}</td>
                    <td>{{ $candidats->email }}</td>
                    <td>{{ $candidats->nom }}</td>
                    <td>{{ $candidats->prenom }}</td>
                    <td>{{ $candidats->telephone }}</td>
                    <td>{{ $candidats->adresse }}</td>
                    <td>{{ $candidats->domaine }}</td>
                    <td>
                        {{-- <a href="{{route('edit-candidat',$candidats->id )}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> --}}
                        <a onclick="return confirm('Souhaitez-vous le supprimer')" href="{{route('delete-candidat',$candidats->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a href="{{route('show.candidat',$candidats->id)}}" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection


