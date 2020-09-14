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
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{url('/'). '/'.app()->getLocale().'/category'}}">Categories</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('questions.create')}}">Send a question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('new_answer_list')}}">New Answers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all_article')}}">Articles</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Books & articles</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">User guide</a>
                    </li>
                    <li>
                        <search-bar></search-bar>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
