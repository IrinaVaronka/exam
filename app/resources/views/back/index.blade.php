@extends('layouts.app')

@section('content')

<form class="mt-4">
    <h1 class="text-center">All services</h1>

    <form action="{{route('services-index')}}" method="get" class="mt-4">
    </form>

    <div class="container">
        <div class="row">
            <div class="col-10 mt-6">
               <li class="list-group-item">
                            @forelse($services as $service)
                            <div class="m-line">
                                <h5 class="card-title"> Title: {{ $service->title }}</h5>
                                <p class="card-text"> Address: {{ $service->address }}</p>
                                <p class="card-text"> Lead:{{$service->lead}}</p>
                                <a href="{{route('services-edit', $service)}}" class="btn btn-outline-success">Edit</a>
                                <form action="{{route('services-delete', $service)}}" method="post">
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                </li>
                @empty
                <li class="list-group-item">
                    No cars
                </li>
                @endforelse
            </div>
        </div>
    </div>
    @endsection



    