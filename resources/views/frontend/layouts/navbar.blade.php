<div class="main-menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="MyNavbar">
        <div class="container">
            <a class="navbar-brand text-center" href="{{route('home')}}">Islamic Question <br />
                & Answer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('questions.create')}}">{{__('Send a New Question')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">new Answers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Get to know Islam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Books & articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">User guide</a>
                    </li>
                    <li>
                        <div id="myOverlay" class="overlay">
                            <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                            <div class="overlay-content">
                                <form>
                                    <input type="text" placeholder="Type to Search.." name="search">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <button class="openBtn" onclick="openSearch()"><i class="fas fa-search"></i></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
