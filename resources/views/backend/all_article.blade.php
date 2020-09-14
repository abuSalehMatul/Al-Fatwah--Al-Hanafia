@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">

        <div class="row">
            @foreach ($articles as $article)
                
                    <div class="col-md-12">
                        <div class="white-box">
                            <a href="{{ route('admin.article.find', $article->id) }}">
                            <h4 class="box-title">
                                <b class="badge badge-secondary"> {{ $article->status }}</b>
                                {{ $article->title }}
                            </h4>
                            </a>
                            <p>
                                @role('admin')
                                <select class="form-control" style="width: 20%"
                                    onchange="changeArticleStatus(this, {{ $article->id }})">
                                    <option> All Statuses</option>
                                    <option value="active"> Active </option>
                                    <option value="pending"> Pending </option>
                                    <option value="inactive"> In-active </option>
                                    <option value="denied"> Denied </option>
                                    <option value="in-revision"> In-Revision </option>
                                </select>
                                @endrole
                            </p>
                        </div>
                    </div>
                
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>
@endsection
@section('js')
    <script>
        function changeArticleStatus(dom, id) {
            $.ajax({
                type: "get",
                url: window.location.origin + '/admin/api/article-status-change/' + id + '/' + dom.value,
                success: function(response) {
                    console.log(response);
                    if(response  == 1){
                        alert('successfull');
                    }else{
                        alert("please try again later, something went wrong");
                    }
                    location.reload();
                }
            })
        }

    </script>
@endsection
