@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{-- <div class="jumbotron" style="background-color: #EAEEF2; padding: 1.7%; padding-bottom: 3%; border-radius: 20px 20px">
                <h1 class="display-4">SHOW POST</h1>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button" style="padding: 0">Posts</a>
            </div> --}}
        </div>
    </div>
    <center>
    <div class="row">
        <div class="col">
            <div class="card" style="width: 50rem;">
                <img src="{{URL::asset($post->photo)}}" class="card-img-top" alt="{{$post->photo}}">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" >Tags</label>
                        <br>
                            @foreach ($tags as $item)
                                @foreach($post->tag as $item2)
                                    @if ($item->id == $item2->id)
                                    <label>{{$item->tag}}</label>
                                    ,
                                    @endif
                            @endforeach
                            @endforeach
                    </div>
                    <br>
                    <p class="card-text" style="font-size: 12px">Created at: {{$post->created_at->diffForhumans()}}</p>
                    <p class="card-text" style="font-size: 12px">Updated at: {{$post->updated_at->diffForhumans()}}</p>
                    <a href="{{route('posts')}}" class="btn btn-primary">Go To All Posts</a>
                </div>
            </div>
        </div>
    </div>
</center>
</div>
@endsection
