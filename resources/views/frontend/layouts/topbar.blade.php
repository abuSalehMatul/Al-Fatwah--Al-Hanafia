<div class="top_nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" target="_blank" href="#"><i class="fab fa-facebook color1"></i></a>
                    <a class="nav-link" target="_blank" href="#"><i class="fab fa-linkedin color2"></i></a>
                    <a class="nav-link" target="_blank" href="#"><i class="fab fa-twitter color3"></i></a>
                    <a class="nav-link" target="_blank" href="#"><i class="fab fa-pinterest color4"></i></a>
                    <a class="nav-link" target="_blank" href="#"><i class="fab fa-youtube color5"></i></a>
                    <a class="nav-link" target="_blank" href="#"><i class="fab fa-instagram color6"></i></a>
                </li>
            </ul>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe-americas"></i>
                    {{config("app_langs.".app()->getLocale())}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach(config('app_langs') as $key => $lang)
                    <a class="dropdown-item" href="{{route(request()->route()->getName(),['locale' => $key])}}">{{$lang}}</a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="#" data-action="form-modal" data-form="ajax" data-form_url="{{route('login')}}" data-submit_url="{{route('login')}}" data-submit_btn="{{__('Login')}}" data-modal-title="{{ __('Please login to continue')}}"><i class="far fa-user-circle"></i> {{ __('Login')}}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-action="form-modal" data-form="ajax" data-form_url="{{ route('register') }}" data-submit_url="{{ route('register') }}" data-submit_btn="{{ __('Register') }}" data-modal-title="{{ __('Please register to continue')}}"><i class="far fa-user-circle"></i>{{ __('Register') }}</a>

                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a id="logout-btn" class="dropdown-item" href="#" onclick="logout();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </nav>
    </div>
</div>
<!-- Modal -->
