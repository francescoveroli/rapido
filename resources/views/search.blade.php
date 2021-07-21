@extends('layouts.app')
@section('content')

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 text-center title">
            <h3> Resultado de busqueda: {{$q}}</h3>
        </div>
        @foreach($announcements as $announcement)
        <div class="col-12 col-md-4 d-flex justify-content-center">

            <div class="card shadow text-center cardLayout my-5" style=" width: 30rem;">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{$image->getUrl(300,150)}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-2">
                        <li class="mb-2 title">{{__('ui.title')}}:</li>
                        <p class="text-dark fw-bold">{{$announcement->title}}</p>
                        <li class="mb-2 title ">{{__('ui.price')}}:</li>
                        <p class="text-dark fw-bold">{{$announcement->price}}€</p>
                        <li class="mb-2 title">{{__('ui.description')}}:</li>
                        <p class="text-dark fw-bold">{{$announcement->body}}</p>
                        <li class="mb-2 title">{{__('ui.nameSeller')}}:</li>
                        <p class="text-dark fw-bold">{{$announcement->user->name}}</p>
                        <li class="mb-2 title">{{__('ui.dateAd')}}:</li>
                        <p class="text-dark fw-bold">{{$announcement->created_at->format('d/m/Y')}}</p>
                        <!-- <li class="mb-2 title">{{__('ui.category')}}:</li> -->
                    </ul>
                   <!--  <a class="text-decoration-none"
                        href="{{route('category.announcements',['name'=>$announcement->category->name,'id'=>$announcement->category->id])}}">{{__("ui.{$announcement->category->name}")}}
                    </a>
                    </p> -->
                    <a href="{{route('announcement.details', ['id'=>$announcement->id])}}"
                        class="btn btn-sm btn-outline-none title buttonOverlay">{{__('ui.read')}}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
