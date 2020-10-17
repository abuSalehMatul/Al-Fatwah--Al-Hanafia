<div class="main-menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="MyNavbar">
        <div class="container">
            <a class="navbar-brand text-center" href="{{route('home')}}">Al Fatwah <br />
                 Servent of islam</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('questions.create')}}">{{__('Send a New Question')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('new_answer_list')}}">{{__('New_Answers')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all_article')}}">{{__('Articles')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('About')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('Terms')}}</a>
                    </li>
                    <li>
                        <search-bar></search-bar>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="col-md-10 offset-1 intro">
    {{__('Intro')}}
</div>
