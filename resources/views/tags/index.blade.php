@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron" style="background-color: #EAEEF2; padding: 1.7%; padding-bottom: 3%; border-radius: 20px 20px">
                <h1 class="display-4">All Tags</h1>
                <p class="lead">
                    These tags are created by multiple users.
                </p>
                <hr class="my-4">
                <p>Be careful when editing or deleting any of these tags.</p>
                <a class="btn btn-primary {{--btn-lg--}}" href="{{route('tag.create')}}" role="button">Create Tag</a>
                {{-- <a href="{{route('tags.trashed')}}" class="btn btn-danger" style="margin-right: 30px">Trashed &nbsp;<i class="fa-solid fa-eye"></i></a> --}}
            </div>
        </div>
    </div>
    <div class="row">

        @if ($tags->count() > 0)
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Update Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $item)
                        <tr style="text-align: center">
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->tag}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>
                                <a href="{{route('tag.edit',['id'=>$item->id])}}" style="margin-right: 30px"><i class="fa-solid fa-2x fa-pen-to-square"></i></a>
                                <a href="{{route('tag.destroy',['id'=>$item->id])}}"><i class="fa-solid fa-2x fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No Tags
            </div>
        @endif


    </div>
</div>
@endsection
