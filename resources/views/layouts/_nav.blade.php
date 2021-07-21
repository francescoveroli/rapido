<div id="sideBar" class="side-bar d-block d-md-none d-flex justify-content-center align-items-center">

    <ul class="list-unstyled">
        <li class="mb-3">
            <a class="text-decoration-none tx-main text-uppercase fw-bold"
                href="{{ route('announcement.new') }}">{{__('ui.newAdd')}}</a>
        </li>
        @guest
        @if (Route::has('login'))
        <li class="mb-3">
            <a class="text-decoration-none tx-main text-uppercase fw-bold" href="">{{__('ui.login')}}</a>
        </li>
        @endif
        @if (Route::has('register'))
        <li class="mb-3">
            <a class="text-decoration-none tx-main text-uppercase fw-bold"
                href="{{route('register')}}">{{__('ui.register')}}</a>
        </li>
        @endif
        @else
        <li class="mb-3">
            <form id="logoutForm" action="{{route('logout')}}" method="POST">
                @csrf
            </form>
            <a class="text-decoration-none tx-main text-uppercase fw-bold" id="logoutBtn" class=""
                href="#">{{__('ui.logout')}}</a>
        </li>
        @endguest
        <li class="mb-3">
            <a class="text-decoration-none tx-main text-uppercase fw-bold" href="">Ofertas</a>
        </li>
        <li class="mb-3">
            <a class="text-decoration-none tx-main text-uppercase fw-bold" href="">Contactos</a>
        </li>
    </ul>
</div>

<!-- nav movil -->
<div id="navMovil" class="container-fluid p-2 fixed-top bg-white d-block d-md-none">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <a class="navbar-brand nav-b text-decoration-none tx-main mx-0 mx-md-2" href="{{ route('home') }}">
                <svg id="logo-15" width="35" height="35" viewBox="0 0 49 48" fill="#5d0079"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M24.5 12.75C24.5 18.9632 19.4632 24 13.25 24H2V12.75C2 6.53679 7.03679 1.5 13.25 1.5C19.4632 1.5 24.5 6.53679 24.5 12.75Z"
                        class="ccustom" fill="#5d0079"></path>
                    <path
                        d="M24.5 35.25C24.5 29.0368 29.5368 24 35.75 24H47V35.25C47 41.4632 41.9632 46.5 35.75 46.5C29.5368 46.5 24.5 41.4632 24.5 35.25Z"
                        class="ccustom" fill="#5d0079"></path>
                    <path
                        d="M2 35.25C2 41.4632 7.03679 46.5 13.25 46.5H24.5V35.25C24.5 29.0368 19.4632 24 13.25 24C7.03679 24 2 29.0368 2 35.25Z"
                        class="ccustom" fill="#5d0079"></path>
                    <path
                        d="M47 12.75C47 6.53679 41.9632 1.5 35.75 1.5H24.5V12.75C24.5 18.9632 29.5368 24 35.75 24C41.9632 24 47 18.9632 47 12.75Z"
                        class="ccustom" fill="#5d0079"></path>
                </svg>
                Rapido</a>
            <button id="btn-nav" class="btn btn-warning">Utiles</button>
        </div>
    </div>
</div>






<!-- nav browser -->

<nav class="navbar navbar-expand-lg p-4 mb-2 shadow-sm fixed-top b-nav d-none d-md-block">

    <div class="container-fluid d-flex align-items-center">


        <svg id="logo-15" width="35" height="35" viewBox="0 0 49 48" fill="#5d0079" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.5 12.75C24.5 18.9632 19.4632 24 13.25 24H2V12.75C2 6.53679 7.03679 1.5 13.25 1.5C19.4632 1.5 24.5 6.53679 24.5 12.75Z"
                class="ccustom" fill="#5d0079"></path>
            <path
                d="M24.5 35.25C24.5 29.0368 29.5368 24 35.75 24H47V35.25C47 41.4632 41.9632 46.5 35.75 46.5C29.5368 46.5 24.5 41.4632 24.5 35.25Z"
                class="ccustom" fill="#5d0079"></path>
            <path
                d="M2 35.25C2 41.4632 7.03679 46.5 13.25 46.5H24.5V35.25C24.5 29.0368 19.4632 24 13.25 24C7.03679 24 2 29.0368 2 35.25Z"
                class="ccustom" fill="#5d0079"></path>
            <path
                d="M47 12.75C47 6.53679 41.9632 1.5 35.75 1.5H24.5V12.75C24.5 18.9632 29.5368 24 35.75 24C41.9632 24 47 18.9632 47 12.75Z"
                class="ccustom" fill="#5d0079"></path>
        </svg>
        <a class="navbar-brand nav-b text-decoration-none tx-main mx-0 mx-md-2" href="{{ route('home') }}">Rapido</a>

        {{-- <div class="d-flex">
            @include('layouts._locale',["lang"=>'es','nation'=>'es'])
            @include('layouts._locale',["lang"=>'en','nation'=>'gb'])
            @include('layouts._locale',["lang"=>'it','nation'=>'it'])
        </div> --}}

        <div class="collapse navbar-collapse d-flex d-md-block" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item mx-3">
                    <!-- nuevo annuncio -->
                    <a class="nav-link text-decoration-none tx-sec"
                        href="{{ route('announcement.new') }}">{{__('ui.newAdd')}}</a>
                </li>
                <li class="nav-item mx-3 dropdown">
                    <!-- categorias -->
                    <a class="nav-link text-decoration-none tx-sec dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.category')}}</a>
                    <ul class="dropdown-menu border-0 b-nav" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)

                        <li class="">
                            <a class="dropdown-item text-center mb-3"
                                href="{{route('category.announcements',['name'=>$category->name,'id'=>$category->id])}}">
                                <!--  {{$category->name}} -->
                                {{__("ui.{$category->name}")}}
                            </a>
                        </li>

                        @endforeach
                    </ul>
                </li>
                <li class="nav-item mx-3 dropdown">
                    <!-- idiomas -->
                    <a class="nav-link text-decoration-none tx-sec dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.lenguages')}}</a>
                    <ul class="dropdown-menu border-0 b-nav" aria-labelledby="navbarDropdown">


                        <li class="dropdown-item d-flex align-items-center">

                            @include('layouts._locale',["lang"=>'es','nation'=>'es'])
                            <span>Español</span>

                        </li>
                        <li class="dropdown-item d-flex align-items-center">

                            @include('layouts._locale',["lang"=>'en','nation'=>'gb'])
                            <span>Ingles</span>
                        </li>
                        <li class="dropdown-item d-flex align-items-center">

                            @include('layouts._locale',["lang"=>'it','nation'=>'it'])
                            <span>Italiano</span>
                        </li>
                    </ul>
                </li>
            </ul>


            <!-- acaba bandera -->

            @guest
            @if (Route::has('login'))
            <div class="mx-3 btn btn-warning">
                <a class="text-decoration-none tx-w" href="{{route('login')}}">{{__('ui.login')}}</a>
            </div>
            @endif
            @if (Route::has('register'))
            <div class="mx-3 btn btn-warning">
                <a class="text-decoration-none tx-w" href="{{route('register')}}">{{__('ui.register')}}</a>
            </div>
            @endif
            @else
            <div class="btn  btn-warning">
                <form id="logoutForm" action="{{route('logout')}}" method="POST">
                    @csrf
                </form>
                <a class="text-decoration-none tx-w" id="logoutBtn" class="" href="#">{{__('ui.logout')}}</a>
            </div>
            <!-- revisor -->
            @if (Auth::user()->is_revisor)


            <span class="btn btn-info mx-3">
                <a class="mx-3 text-decoration-none tx-w" href="{{ route('revisor.home') }}">{{__('ui.revisor')}}

                    {{\App\Models\Announcement::ToBeRevisionedCount() }}
                </a>
            </span>
            @endif
            @endguest
        </div>
    </div>
</nav>


@push('scripts')

<script>
    document.querySelector('#btn-nav').addEventListener('click', () => {
        let sidebar = document.querySelector('#sideBar')
        sidebar.classList.toggle('active')
    })

</script>

@endpush
