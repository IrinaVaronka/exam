@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Edit the master</h3>
                    <p>Fill in the data below</p>
                    <form action="{{route('masters-update', $master)}}" method="post">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="name" placeholder="Name" value={{old('name')}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="surname" placeholder="Surname" value={{old('surname')}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="specialization" placeholder="Specialization" value={{old('specialization')}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="city" placeholder="City" value={{old('city')}}>
                        </div>

                        <div class="card-body mt-3 col-6">
                            <select class="form-select" name="service_id">
                                <option value=" 0">Service</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                            <div class="form-text">Please select service here</div>
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
