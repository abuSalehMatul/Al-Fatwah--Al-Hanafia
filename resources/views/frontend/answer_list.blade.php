@extends('frontend.layouts.master')
@section('content')

<div class="main-section mt-5">
    <div class="container">
        <a v-for="(answer, index) in newAnswers" @click.prevent="getAnswer(answer)" v-if="index < 5">
            <div class="card">
              <div class="card-body">
                <div class="left-text">
                  <i class="far fa-bookmark"></i>
                  <span>{{answer.description.substring(0, 100)}}...</span>
                </div>
              </div>
            </div>
          </a>
    </div>
</div>
@endsection