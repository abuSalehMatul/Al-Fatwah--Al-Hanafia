@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="white-box">
                <h3 class="box-title">Total Answers</h3>
                <h2> {{$data['total_answered']}} </h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-box">
                <h3 class="box-title">Total Questions</h3>
                <h2> {{$data['total_question']}} </h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-box">
                <h3 class="box-title">Categories</h3>
                <h2> {{$data['total_category']}} </h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="white-box">
                <h3 class="box-title">Total Users</h3>
                <h2> {{$data['total_user']}} </h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-box">
                <h3 class="box-title">Total Books</h3>
                <h2> {{$data['total_book']}} </h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-box">
                <h3 class="box-title">Published Articles</h3>
                <h2> {{$data['publish_article']}} </h2>
            </div>
        </div>
    </div>
    <div>
        <admin-report></admin-report>
    </div>
</div>
@endsection