@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row space-position">
        <div class="col-md-12">
            <div class="white-box">
                <books :all_books = "{{json_encode($books)}}"> </books>
            </div>
        </div>
    </div>
</div>
@endsection