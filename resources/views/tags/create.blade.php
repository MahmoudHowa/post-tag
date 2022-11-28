@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron" style="background-color: #EAEEF2; padding: 1.7%; padding-bottom: 3%; border-radius: 20px 20px">
                <h1 class="display-4">CREATE TAG</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="{{route('tags')}}" style="padding: 0" role="button">All Tags</a>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <hr class="my-4">
    <div class="row">
        @if (count($errors) > 0)
            <ol>
                @foreach ($errors->all() as $item)
                    <li> {{$item}} </li>
                @endforeach
            </ol>
        @endif
        <div class="col">
            <form action=" {{route('tag.store')}} " method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group" style="margin-top: 1%">
                    <button type="submit" class="btn btn-danger">save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
