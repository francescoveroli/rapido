@extends('layouts.app')
@section('content')



<div class="container my-5 py-5 head">
    <div class="row h-100 align-items-center">
        <div class="col-12 col-md-4">
            <h1 class="display-3 fw-bolder title">{{__('ui.welcome')}}</h1>
            <p class="small mt-5 tx-muted">La plataforma líder de compraventa de productos de segunda mano.</p>
        </div>
    </div>
</div>

@if(session('announcement.create.success'))
<div class="alert alert-success">{{session('announcement.create.success')}}</div>
@endif
 <!-- anuncio por categoria -->
<h1>Anuncios por categoria: {{$category->name}}</h1>

@foreach($announcements as $announcement)
<div class="row my-3">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card card border-0 shadow" style="width: 30rem;">
            <div class="card-header">
                {{$announcement->title}}
            </div>
            <p>
                {{$announcement->price}}
            </p>
            
            <div class="car-body d-flex">
                <img src="https://via.placeholder.com/150" alt="">
                <p>
                    {{$announcement->body}}
                </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <!-- categoria -->
                <strong>Categoria: <a href="#">{{$announcement->category->name}}</a></strong>
                <i>{{$announcement->created_at->format('d/m/Y')}}-{{$announcement->user->name}}</i>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="row my-3">
        <div class="col-12 col-md-8 offset-md-2">
        {{ $announcements->links() }}
        </div>
    </div>
    
</div>
@endsection
