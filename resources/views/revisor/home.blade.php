@extends('layouts.app')
@section('content')
@if ($announcement)
<div class='container py-5 my-5'>
    <div class='row my-4'>
        <div class="col-12 text-center">
            <h1 class="display-3 fw-bolder title">Todos los artículos a la espera de ser revisados</h1>
            <p class="small mt-3 tx-muted">Empiece ahora con un simple clic</p>
        </div>
        <div class="card p-3 border-0 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        Anuncio #{{$announcement->id}}
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Usuario</h3>
                            </div>
                            <div class="col-md-7">
                                #{{$announcement->user->id}}
                                {{$announcement->user->name}}
                                {{$announcement->user->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Titulo</h3>
                            </div>
                            <div class="col-md-7">
                                {{$announcement->title}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Descripción</h3>
                            </div>
                            <div class="col-md-7">
                                {{$announcement->body}}
                            </div>
                        </div>
                        <div class="row my-3">
                        <div class="col-12 text-center">
                        <p class="title lead fw-bold">Revisa el anuncio aceptandolo o rechazandolo</p>
                        </div>
                            <div class="col-12 d-flex justify-content-around ">
                                <div>
                                    <form action="{{route('revisor.announcement.accept',['id'=>$announcement->id])}}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Aceptar</button>
                                    </form>
                                </div>
                                <div>
                                    <form action="{{route('revisor.announcement.reject',['id'=>$announcement->id])}}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Rechazar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            @foreach ($announcement->images as $image)
                            <div class="col-12 mb-3">
                                <img src="{{$image->getUrl(300,150)}}" class="d-block mx-auto shadow mb-2" alt="...">
                                <p class="title lead fw-bold mb-2">Google Safe Search API Response</p>
                                <ul class="list-unstyled mb-2">
                                    <li class="mb-2"> Adult: {{$image->adult }}</li>
                                    <li class="mb-2"> spoof: {{$image->spoof }}</li>
                                    <li class="mb-2"> medical: {{$image->medical }}</li>
                                    <li class="mb-2"> violence: {{$image->violence }}</li>
                                    <li class="mb-2"> racy: {{$image->racy }}</li>
                                    <li class="mb-2">{{$image->id }}</li>
                                </ul>
                                <ul>
                                    @if($image->labels)
                                    @foreach($image->labels as $label)
                                    <li>{{$label}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!-- no hay anuncios para revisar -->
<div class="container my-5 py-5 head headline">
    <div class="row h-100 align-items-center">
        <div class="col-12 col-md-4">
            <h3 class="text-center"> No hay mas anuncios para revisar </h3>
        </div>
    </div>
</div>
@endif
@endsection
