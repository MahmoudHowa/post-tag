@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron" style="background-color: #EAEEF2; padding: 1.7%; padding-bottom: 3%; border-radius: 20px 20px">
                <h1 class="display-4">All Users</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary {{--btn-lg--}}" href="{{route('user.create')}}" role="button">Create User</a>
                {{-- <a href="{{route('tags.trashed')}}" class="btn btn-danger" style="margin-right: 30px">Trashed &nbsp;<i class="fa-solid fa-eye"></i></a> --}}
            </div>
        </div>
    </div>
    <div class="row">

        @if ($users->count() > 0)
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($users as $item)
                        <tr style="text-align: center">
                            <th scope="row">{{$i++}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{route('user.destroy',['id'=>$item->id])}}"><i class="fa-solid fa-2x fa-trash text-danger"></i></a>
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
