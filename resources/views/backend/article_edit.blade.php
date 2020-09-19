@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <form method="POST" action="{{route('admin.article.edit')}}">
                    @csrf
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <div class="form-group">
                        <label>Title </label>
                        <input type="text" name="title" value="{{$article->title}}" class="form-control">
                    </div> 
                    <hr>
                    <div class="form-group">
                        <label>Aritcle .</label>
                        <textarea name="body" rows="20" class="form-control">
                            {{$article->body}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn badge-info" style="width: 100%" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection