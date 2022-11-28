@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron" style="background-color: #EAEEF2; padding: 1.7%; padding-bottom: 3%; border-radius: 20px 20px">
                <h1 class="display-4">EDIT POST</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button" style="padding: 0">Posts</a>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <hr class="my-4">
    <div class="row">
        @if (count($errors) > 0)
            <ol>
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger" role="alert">
                        <li> {{$item}} </li>
                    </div>
                @endforeach
            </ol>
        @endif
        <div class="col">
            <form action=" {{route('post.update', ['id'=>$post->id])}} " method="POST" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" => To allow the photo to be uploaded --}}
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Photo</label>
                    <input type="file" name="photo" value="{{$post->photo}}" class="form-control">
                </div>
                {{-- <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                </div> --}}
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tags</label>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                        @foreach ($tags as $item)
                            <input class="form-check-input position-static" name="tags[]" type="checkbox" value="{{$item->id}}"
                                @foreach($post->tag as $item2)
                                    @if ($item->id == $item2->id)
                                        checked
                                    @endif
                                @endforeach
                            >
                            <label>{{$item->tag}}</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea class="form-control" name="content" rows="3">{{$post->content}}</textarea>
                </div>
                <div class="form-group" style="margin-top: 1%">
                    <button type="submit" class="btn btn-secondary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
