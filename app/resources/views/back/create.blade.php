@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Add a new service</h3>
                    <p>Fill in the data below</p>
                    <form action="{{route('services-store')}}" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="title" placeholder="Title" value={{old('title')}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="address" placeholder="Address" value={{old('address')}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="lead" placeholder="Lead" value={{old('lead')}}>
                        </div>
                       
                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Add service</button>
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
