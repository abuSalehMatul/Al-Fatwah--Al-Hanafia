@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="white-box">
                <form method="POST" action="{{route('admin.article.create.save')}}">
                    @csrf
                    <div class="form-group col-md-12 col-sm-12">
                        <label>Title </label>
                        <input type="text" name="title" placeholder="Add a title" class="form-control">
                    </div> 
                    <div class="col-md-12 col-sm-6 form-group" style="display: flex">
                        <label>Category</label>
                        <select class="form-control col-md-6" name="category"> 
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name_en}}/{{$category->name_bn}}/{{$category->name_ar}}</option>
                            @endforeach
                        </select>
                        <label>Language</label>
                        <select class="form-control col-md-3" name="lang"> 
                            @foreach($langs as $key => $lang)
                            <option value="{{$key}}">{{$lang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group col-md-12">
                        <label>Aritcle .</label>
                        <textarea name="body" rows="20" placeholder="Details..."  class="form-control">
                            
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