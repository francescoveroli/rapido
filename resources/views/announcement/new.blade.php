@extends('layouts.app')
@section('content')

<div class="container my-5 py-5 ">
    <div class="row my-5 py-5">
        <div class="col-12 text-center">
            <h2 class="fw-bolder title">Agregar nuevo anuncio en Rapido</h2>
            <p class="small mt-3 tx-muted">La plataforma líder de compraventa de productos de segunda mano.</p>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-12 col-md-6">
                <div class="card shadow border-0 p-3">
                    <div class="card-body">
                        <h4 class="tx-sec">Para agregar rellena el formulario 👇🏻</h4>
                        <form method="POST" action='{{route("announcement.create")}}'>
                            @csrf

                              <div class="card-header title d-none ">
                                Nuevo anuncio (Secret: {{$uniqueSecret}})
                            </div> 
                            <input class="d-none" type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                            <!-- categorias -->
                            <div class="form-group py-3">
                                <label class="title fw-bold mb-2" for="categories">Categorias</label>
                                <select class="form-control mb-2" id="categories" name="category">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{old('category') == $category->id ? 'selected' : ''}}>{{__("ui.{$category->name}")}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert"><strong>{{message}}</strong></span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="announcementImages" class="form-label title">Imagenes</label>
                                <div class="dropzone" id="drophere"></div>
                                @error('images')
                                <small class="alert alert-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group py-3">
                                <!-- titulo -->
                                <label class="title fw-bold mb-2" for="announcementeName">Titulo</label>
                                <input type="text" class="form-control mb-2" id="announcementeName"
                                    aria-describedby="emailHelp" name="title" value="{{old("title")}}">
                                @error('title')
                                <small id="emailHelp" class="form-text" style="color:red;">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <!-- anuncio -->
                                <label class="title fw-bold mb-2" for="announcementeBody py-3">Anuncio</label>
                                <textarea class="form-control mb-2" name="body" id="announcementeBody" cols="30"
                                    rows="10">{{old("body")}}</textarea>
                                @error('body')
                                <small id="emailHelp" class="form-text" style="color:red;">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group py-3">
                                <!-- precio -->
                                <label class="title fw-bold mb-2" for="announcementPrice">Precio</label>
                                <input type="number" step="0.01" class="form-control mb-2" id="announcementPrice"
                                    aria-describedby="priceHelp" name="price" value="{{old("price")}}">
                                @error('price')
                                <small id="priceHelp" class="form-text" style="color:red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--  enviar   -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn buttonOverlay title p-3">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
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
