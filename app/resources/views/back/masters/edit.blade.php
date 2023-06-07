@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Edit the service</h3>
                    <p>Fill in the data below</p>
                    <form action="{{route('services-update', $service)}}" method="post">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="title" placeholder="Title" value={{old('title', $service->title)}}>
                        </div>

                       <div class="col-md-12">
                            <input class="form-control" type="text" name="address" placeholder="Address" value={{old('address', $service->address)}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="lead" placeholder="Lead" value={{old('lead', $service->lead)}}>
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Update service</button>
                            @csrf
                            @method('put')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
