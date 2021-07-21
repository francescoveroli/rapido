@extends('layouts.app')
@section('content')

<!-- <div class="container my-5 py-5 title">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="tx-main">Descubre mas sobre los ultimos anuncios</h2>
        </div>
    </div>
</div> -->
<div class="container my-5 py-5">
    <div class="row">
        <div class='col-12 text-center'>
            <h1 class="title">Tus categoria favoritas:</h1> 
            <h3 class="text-dark">{{__("ui.{$category->name}")}}</h3>
        </div>
    </div>
    @foreach($announcements as $announcement)
    <div class="row my-3">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card shadow p-3 mb-5 bg-body text-center cardLayout my-5">
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
                <div class="card-footer text-capitalize ">
                <ul class="list-unstyled mb-2">
                                    <li class="mb-2 tx-main">{{__('ui.title')}}:</li>
                                    <p class="text-dark fw-bold">{{$announcement->title}}</p>
                                    <li class="mb-2 tx-main ">{{__('ui.price')}}:</li>
                                    <p class="text-dark fw-bold">{{$announcement->price}}€</p>
                                    <li class="mb-2 tx-main">{{__('ui.description')}}:</li>
                                    <p class="text-dark fw-bold">{{$announcement->body}}</p>
                                    <li class="mb-2 tx-main">{{__('ui.nameSeller')}}:</li>
                                    <p class="text-dark fw-bold">{{$announcement->user->name}}</p>
                                    <li class="mb-2 tx-main">{{__('ui.dateAd')}}:</li>
                                    <p class="text-dark fw-bold">{{$announcement->created_at->format('d/m/Y')}}</p>
                </ul>
                    <!-- <p>{{$announcement->body}}</p>
                    <i class="text-capitalize">{{$announcement->created_at->format('d/m/Y')}} -
                        {{$announcement->user->name}}</i> -->
                      
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container">
        <div class="row my-3">
            <div class="col-12 col-md-8 offset-md-2">{{ $announcements->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>
        /*  Initialize Swiper  */

        var swiper = new Swiper(".mySwiper", {
            effect: "cube",
            grabCursor: true,
            cubeEffect: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });

        /* log out */


        const logout = document.getElementById('logoutBtn');
        if (logout) {
            logout.addEventListener('click', (e) => {
                e.preventDefault();
                const form = document.getElementById('logoutForm').submit();
            });
        }

        /* scroll reveal */

        ScrollReveal().reveal('.headline', {
            duration: 750,
            delay: 400,
            distance: '80px',
            interval: 600,
            easing: 'cubic-bezier(0.3, 0, 0, 0.5)'
        });

    </script>
    @endpush

@endsection
