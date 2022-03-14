@extends('layouts.admin')

@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/select/select2.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<style>
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        display: none;
    }
</style>


@endpush

@push('script')

<script src="{{asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/forms/form-select2.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endpush

@section('content')



@if ($errors->any())
@foreach ($errors->all() as $error)
<div>{{$error}}</div>
@endforeach
@endif


@if (session()->has('success'))
<div class="text-danger">{{session()->get('success')}}</div>
@endif


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="basicInput">Product Title</label>
                        <input type="text" name="title" class="form-control" id="basicInput" placeholder="Enter prodcut title">
                        <span class="text-danger">{{$errors->first('title')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Product Description</label>
                        <textarea name="description" class="form-control" name="" id="summernote" cols="30" rows="10"></textarea>
                        <span class="text-danger">{{$errors->first('description')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Product Price</label>
                        <input type="number" name="price" class="form-control" id="basicInput" placeholder="Enter prodcut title">
                        <span class="text-danger">{{$errors->first('price')}}</span>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label>Category</label>
                        <select name="category_id" class="select2 form-control form-control-lg">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>

                        <span class="text-danger">{{$errors->first('category')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Product image</label>
                        <input type="file" name="image">
                        <span class="text-danger">{{$errors->first('image')}}</span>
                    </div>

                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection