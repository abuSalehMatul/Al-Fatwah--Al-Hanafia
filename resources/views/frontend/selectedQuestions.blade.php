@extends('frontend.layouts.master')
@section('content')

<div class="main-section mt-5">
    <div class="container">
      @foreach ($questions as $question)
      <a href="{{route('question.answer',[ $question->id])}} ">
        <div class="card">
          <div class="card-body">
            <div class="left-text">
              <i class="far fa-bookmark"></i>
              <span>{{$question->title}}</span>
            </div>
            <div class="left-text">
              <span>{{$question->description}}</span>
            </div>
          </div>
        </div>
      </a>
      @endforeach
      {{ $questions->links() }}
    </div>
</div>
@endsection