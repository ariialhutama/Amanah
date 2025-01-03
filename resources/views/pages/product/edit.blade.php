@extends('layouts.app')

@section('title', 'Product Edit')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('product.index') }}">List Product</a></div>
                    <div class="breadcrumb-item">Edit Product</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-success">
                    <form action="{{ route('product.update', $products) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-header">
                            <h4 class="section-title">Edit Product</h4>
                        </div>
                        <div class="card-body">
                            {{-- Name --}}
                            <div class="form-group">
                                <label>Name Product</label>
                                <input type="text" class="form-control"
                                    @error('name')
                                         is-invalid
                                    @enderror
                                    name="name" value="{{ $products->name }}" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="summernote-simple"
                                    @error('description')
                                        is-invalid
                                    @enderror>{{ $products->description }}
                                </textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Price --}}
                            <div class="form-group">
                                <label>Price</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control" name="price"
                                        value="{{ $products->price }}"
                                        @error('price')
                                    is-invalid
                                        @enderror>
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>

                            </div>

                            {{-- Category --}}
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" multiple="" name="category[]">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $products->category_id ? 'selected' : '' }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            {{-- Image --}}
                            <div class="form-group">
                                <label>Image</label>
                                <div>
                                    <input type="file" class="form-control" name="image"
                                        @error('image')
                                            is-invalid
                                        @enderror>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
                            {{-- <button class="btn btn-secondary">Back</button> --}}
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
@endpush
