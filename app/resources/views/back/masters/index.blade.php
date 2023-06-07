@extends('layouts.app')

@section('content')

<form class="mt-4">
    <h1 class="text-center">All masters</h1>

    <form action="{{route('masters-index')}}" method="get" class="mt-4">
    </form>

    <div class="container">
        <div class="row">
            <div class="col-10 mt-6">
               <li class="list-group-item">
                            @forelse($masters as $master)
                            <div class="m-line">
                                <h5 class="card-title"> Name: {{ $master->name }}</h5>
                                <p class="card-text"> Surname: {{ $master->surname }}</p>
                                <p class="card-text"> Specialization:{{$master->specialization}}</p>
                                 <p class="card-text"> City:{{$master->city}}</p>
                                  <p class="card-text"> Service:{{$master->service_id}}</p>
                                <a href="{{route('masters-edit', $master)}}" class="btn btn-outline-success">Edit</a>
                                <form action="{{route('masters-delete', $master)}}" method="post">
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                </li>
                @empty
                <li class="list-group-item">
                    No master
                </li>
                @endforelse
            </div>
        </div>
    </div>
    @endsection



    