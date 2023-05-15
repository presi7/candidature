@extends('layouts.app')

@section('content')

<div class="conatiner">
    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{session('success')}}
    </div>
    @endif
    <div class="card-header bg-info text-white py-3">Document</div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card-body">

                @csrf

                    <iframe  class="iframe-container" height="800" width="700" src="{{asset('file/'.$candidat->myfile)}}" ></iframe>

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


</div>

@endsection
