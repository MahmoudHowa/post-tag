@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron" style="background-color: #EAEEF2; padding: 1.7%; padding-bottom: 3%; border-radius: 20px 20px">
                <h1 class="display-4">TRASHED POSTS</h1>
                <p class="lead">
                    These are the posts I sent to the trash.
                </p>
                <hr class="my-4">
                <p>You can delete the post or undo and return it to your posts on the site.</p>
                <a class="btn btn-primary {{--btn-lg--}}" href="{{route('posts')}}" style="padding: 0" role="button">All Posts</a>
            </div>
        </div>
    </div>
    <div class="row">

        @if ($posts->count() > 0)
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">User</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                        <tr style="text-align: center">
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->title}}</td>
                            {{-- <td>{{$item->updated_at->diffForhumans()}}</td> --}}
                            <td>{{$item->updated_at}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>
                                <img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-tumbnail" width="100" height="100">
                                {{-- <img src="{{$item->photo}}" alt="{{$item->photo}}" class="img-tumbnail" width="100" height="100"> --}}
                            </td>
                            <td>
                                @if ($item->user_id == Auth::id())
                                <a href="{{route('post.restore',['id'=>$item->id])}}" style="margin-right: 30px"><i class="fa-solid fa-2x fa-trash-can-arrow-up text-success"></i></a>
                                <a href="{{route('post.hdelete',['id'=>$item->id])}}"><i class="fa-solid fa-2x fa-eraser text-danger"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-success" role="alert">
                Empty Trash
            </div>
        @endif


    </div>
</div>
@endsection
