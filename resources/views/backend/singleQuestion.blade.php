@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="col-md-12">
                <div style="display: :flex">
                    <div class="space-position col-md-5">
                        @role('admin')
                        <tr>
                            <td> <a class="btn"
                                    href="{{ route('question.change.status', [$question->id, $question->status]) }}">{{ $question->status != 'active' ? 'Active' : 'Deactive' }}</a>
                            </td>
                            <td> <a class="btn" href="{{route('question.edit', $question->id)}}">Edit </a> </td>
                            @if (!$question->is_selected)
                                <td> <a class="" href="{{ route('question.selection', [$question->id]) }}">Selected Question
                                    </a> </td>
                            @else
                                <td> <a class="btn" href="{{ route('question.selection', [$question->id]) }}">Unselect</a>
                                </td>
                            @endif

                        </tr>
                        @endrole

                    </div>
                    <div class="space-position col-md-5 col-sm-12">
                        <tr>
                            <td> <i class="badge {{ $question->status == 'active' ? 'badge-info' : 'badge-warning' }}">
                                    {{ $question->status }} </i> </td>
                            <td> <i class="badge {{ $question->status == 1 ? 'badge-info' : 'badge-danger' }}">Is Answered:
                                    {{ $question->is_answered == 0 ? 'No' : 'Yes' }} </i> </td>
                            <td> <i class="badge badge-success">{{ $question->tag }} </i></td>
                            <td> <i class="badge badge-success badge-sm"> Category: {{ $question->category->name_en }} </i>
                            </td>
                            <td> <i class="badge badge-success badge-sm"> Views: {{ $question->view_count }} </i></td>
                            <td> <i class="badge badge-sm badge-success"> Asked at:
                                    {{ $question->created_at->format('d-m-y h:i:s') }} </i></td>
                            <td></td>
                        </tr>


                    </div>
                </div>
                <div class="col-md-6 bg-center space-position">
                    <form method="post" class="col-md-4 col-sm-12" action="{{ route('question.add.tag') }}">
                        @csrf
                        <input type="hidden" value="{{ $question->id }}" name="question_id">
                        <label>Add A TAG</label>
                        <input type="text" placeholder="Enter a Tag" name="tag" value="{{ $question->tag }}">
                    </form>

                </div>

                <div class="col-md-12 space-position">

                    <div> 
                        <h4 class="offset-1"><u>Title</u>: {{ $question->title }}</h4>
                    </div>
                    
                    <div class="panel-body">
                        {{ $question->description }}
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div> 
                <a href="{{route('admin.question.answer', $question->id)}}" class="text-blue col-md-4 col-sm-12">Answer this question</a>
            </div>
            <div class="card col-md-12">
                <b>User info</b>
                <h6>Email: <i>{{ $question->created_by == null ? '' : $question->user->email }}</i></h6>
                <h6>Name: <b>{{ $question->created_by == null ? '' : $question->user->name }}</b></h6>
            </div>

        </div>
    </div>
@endsection
