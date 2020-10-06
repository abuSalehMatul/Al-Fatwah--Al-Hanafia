@extends('frontend.layouts.master')
@section('content')

<div class="main-section mt-5">
    <div class="container">
      @foreach ($answers as $answer)
      <a href="{{url('/')."/".$answer->language."/answer/".$answer->batch_id}} ">
        <div class="card">
          <div class="card-body">
            <div class="left-text">
              <i class="far fa-bookmark"></i>
              <span>{{$answer->title}}</span>
            </div>
            <div class="left-text">
              <span>{{$answer->description}}</span>
            </div>
          </div>
        </div>
      </a>
      @endforeach
       
    </div>
</div>
@endsection