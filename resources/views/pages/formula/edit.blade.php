@extends('layouts.app')

@section('title', 'Formula Edit')

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
                <h1>Create Formula</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('formula.index') }}">List Formula</a></div>
                    <div class="breadcrumb-item">Edit Formula</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-success">
                    <form action="{{ route('formula.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="section-title">Edit Formula</h4>
                        </div>

                        <div class="card-body">
                            {{-- Name --}}
                            <div class="form-group">
                                <label>Name Formula</label>
                                <input type="text"
                                    class="form-control
                                    @error('name')
                                         is-invalid
                                    @enderror"
                                    name="name" value="{{ $formulas->name }}" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Material --}}
                            <div class="form-group">
                                <label>Material</label>
                                <select class="form-control select2" multiple="multiple" name="material[]">
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}"
                                            @if (in_array($material->id, $formula_materials)) selected @endif>{{ $material->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('material')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('formula.index') }}" class="btn btn-secondary">Back</a>
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
