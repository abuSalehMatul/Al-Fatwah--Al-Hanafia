@extends('frontend.layouts.master')
@section('content')
    <div class="main-section mt-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="left-text">
                        <i class="far fa-bookmark"></i>
                        <span>
                            <b>{{ $questionAnswer->title }}</b>
                        </span>
                    </div>
                    <div class="left-text">
                        <span>
                            {{ $questionAnswer->description }}...
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <br>
            <div class="card">
                <div class="card-body " style="background: #c3f4c1">
                    <div class="left-text">
                        <i class="fas fa-arrow-right"></i>
                        <span>
                            @php
                                $answer = "answer_".app()->getLocale();
                            @endphp
                            @if($questionAnswer->$answer->title)
                            {{ $questionAnswer->$answer->title }}
                            @endif
                        </span>

                       <br>
                        <span>
                            @php
                                $answer = "answer_".app()->getLocale();
                            @endphp
                            @if($questionAnswer->$answer->description)
                            {{ $questionAnswer->$answer->description }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
