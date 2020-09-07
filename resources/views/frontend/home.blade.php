@extends('frontend.layouts.master')
@section('content')

<div class="main-section mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-4">
          <div class="new_answer mb-5">
            <h4 class="text-center mb-4">
              <i class="fas fa-feather-alt"></i> New Answers
            </h4>
            <new-answer></new-answer>
            <a href="{{route('new_answer_list')}}" style="float: right; color: #ed174b; font-weight: 600;">See more....</a>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="selected_answer">
            <h4 class="text-center mb-4" style="font-size: 20px;">
              Selected Questions
            </h4>
            <selected-question></selected-question>
            <a href="#" style="float: right; color: #ed174b; font-weight: 600;">See more....</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="important_topics text-center mt-4 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-md-12">
          <div class="section_heading text-center">
            <span>Welcome to</span>
            <h3>
              <i class="fas fa-exclamation-circle"></i> Important Topics
            </h3>
          </div>
        </div>
      </div>
      <category-with-short-list :app_local="'{{app()->getLocale()}}'"></category-with-short-list>
    </div>
  </div>
  <div class="tabs_topics mb-5">
    <div class="container">
      <!-- Nav tabs -->
      
    </div>
  </div>
  <div class="read-section mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-5">
          <div class="new_answer mb-5">
            <h4 class="text-center mb-4">
              <i class="fas fa-book-reader"></i> Most Read
            </h4>
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <div class="left-text">
                    <i class="far fa-bookmark"></i>
                    <span>
                      It is not valid to combine making up missed Ramadaan
                      fasts with fasting six days of Shawwaal with one
                      intention
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <div class="left-text">
                    <i class="far fa-bookmark"></i>
                    <span>
                      Can a woman compare between more than one suitor before
                      rejecting the first one?
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <div class="left-text">
                    <i class="far fa-bookmark"></i>
                    <span>
                      It is not valid to combine making up missed Ramadaan
                      fasts with fasting six days of Shawwaal with one
                      intention
                    </span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-5">
          <div class="article_section">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#books">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#article">Articles</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="books" class="container tab-pane active">
                <br />
                <h5 class="text-center">70 Matters related to Fasting</h5>
                <img src="img/books.jpg" alt="" />
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Maiores accusantium ipsa minus et ea labore ad at laudantium
                  explicabo sed?...
                </p>
                <div class="btn-article text-center mb-3">
                  <a href="#" class="btn btn-read">
                    <i class="fas fa-book"></i> Read Book</a>
                  <a href="#" class="btn btn-article">
                    <i class="fas fa-download"></i> Download Book</a>
                </div>
              </div>
              <div id="article" class="container tab-pane fade">
                <br />
                <div class="article mb-3 p-20">
                  <a href="#">
                    <h4>Eid: Etiquette and rulings</h4>
                  </a>
                </div>
                <a href="#" class="btn btn-article btn-block">
                  <i class="fas fa-file"></i> Read</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('js')
<script>
  window.getCat = "{{ url('/').'/'.app()->getLocale().'/get-category'  }}";
</script>
@endsection