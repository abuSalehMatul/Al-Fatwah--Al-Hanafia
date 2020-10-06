@extends('frontend.layouts.master')
@section('content')

<div class="main-section mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-4">
          <div class="new_answer mb-5">
            <h4 class="text-center mb-4">
            {{-- zisan dev branch --}}
            {{-- <i class="fas fa-feather-alt"></i> {{__('New Answers')}}
            </h4>
            @if(empty($latest_answered_question) || count($latest_answered_question) == 0)
            <h3 class="text-center">{{__('Sorry Nothing found')}}</h3>
            @else
              @foreach($latest_answered_question as $key => $question)
              <a href="{{route('question.view', $question->id)}}">
                <div class="card">
                  <div class="card-body">
                    <span class="left-text">
                      <i class="far fa-bookmark"></i>
                      <span>
                        {{$question->title}}
                      </span>
                    </span>
                    <span class="float-right">
                      {{date('Y-m-d', strtotime($question->answered_at))}}
                    </span>
                  </div>
                </div>
              </a>
              @endforeach
              <a href="#" style="float: right; color: #ed174b; font-weight: 600;">See more....</a>
            @endif --}}
            {{-- zisan dev branch ends --}}
              <i class="fas fa-feather-alt"></i> {{__('New_Answers')}}
            </h4>
            <new-answer></new-answer>
            <a href="{{route('new_answer_list')}}" style="float: right; color: #ed174b; font-weight: 600;">{{__('See_More')}}....</a>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="selected_answer">
            <h4 class="text-center mb-4" style="font-size: 20px;">

            {{-- zisan dev branch --}}
            {{-- {{__('Selected Questions')}}
            </h4>
            @if(empty($selected_questions) || count($selected_questions) == 0)
            <h3 class="text-center">{{__('Sorry Nothing found')}}</h3>
            @else
              @foreach($selected_questions as $key => $question)
              <a href="{{route('question.view', $question->id)}}">
                <div class="card active">
                  <div class="card-body">
                    <div class="left-text">
                      <i class="far fa-bookmark"></i>
                      <span>
                        {{$question->title}}
                      </span>
                    </div>
                  </div>
                </div>
              </a>
              @endforeach
              <a href="#" style="float: right; color: #ed174b; font-weight: 600;">See more....</a>
            @endif --}}
              {{__('Selected_Questions')}}
            </h4>
            <selected-question></selected-question>
            <a href="{{route('selected.answer')}}" style="float: right; color: #ed174b; font-weight: 600;">{{__('See_More')}}....</a>
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
            <span> {{__('Welcome_to')}}</span>
            <h3>
              <i class="fas fa-exclamation-circle"></i>{{__('Important_Topics')}}
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
              <i class="fas fa-book-reader"></i> {{__('Most_Read')}}
            </h4>
              <most-read :app_local="'{{app()->getLocale()}}'"></most-read>
          </div>
        </div>
        <div class="col-md-4 mb-5">
          <div class="article_section">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#books">{{__('Books')}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#article">{{__('Articles')}}</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="books" class="container tab-pane active">
                <br />
                 <book-list></book-list>
              </div>
              <div id="article" class="container tab-pane fade" style="overflow-y:scroll ">
                <br />
                <article-short :app_local="'{{app()->getLocale()}}'"></article-short>
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