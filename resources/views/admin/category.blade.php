@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="basicInput">Category</label>
                        <input type="text" name="name" class="form-control" id="basicInput" placeholder="Enter category">
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>

                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection