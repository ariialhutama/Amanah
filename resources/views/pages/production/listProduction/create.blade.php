@extends('layouts.app')

@section('title', 'Production Create')

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
                <h1>Create Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('category.index') }}">List Production</a></div>
                    <div class="breadcrumb-item">Create Production</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-success">
                    <form action="{{ route('production.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="section-title">List Produksi</h4>
                        </div>
                        <div class="card-body">


                            {{-- Nama Brand --}}
                            <div class="form-group">
                                <label>Nama Brand</label>
                                <select class="form-control select2" name="brand_id">
                                    <option value="">-- Pilih Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Nama Product --}}
                            <div class="form-group">
                                <label>Nama product</label>
                                <select class="form-control select2" name="product_id">
                                    <option value="">-- Pilih Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Jumlah --}}
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number"
                                    class="form-control
                                    @error('quantity')
                                         is-invalid
                                    @enderror"
                                    name="quantity" autofocus>
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                {{-- Kemasan --}}
                                {{-- <div class=""> --}}
                                <div class="form-group col-6">
                                    <label>Kemasan</label>
                                    <input type="text"
                                        class="form-control
                                    @error('packaging')
                                         is-invalid
                                    @enderror"
                                        name="packaging" autofocus>
                                    @error('packaging')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Berat_isi --}}
                                <div class="form-group col-6">
                                    <label>Berat Isi</label>
                                    <input type="number"
                                        class="form-control
                                    @error('content_weight')
                                         is-invalid
                                    @enderror"
                                        name="content_weight" autofocus>
                                    @error('content_weight')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- </div> --}}
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="pending" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Pending</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="on-progress" class="selectgroup-input">
                                        <span class="selectgroup-button">On Progress</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="approved" class="selectgroup-input">
                                        <span class="selectgroup-button">Approved</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="rejected" class="selectgroup-input">
                                        <span class="selectgroup-button">Rejected</span>
                                    </label>

                                </div>
                            </div>

                            {{-- Date time --}}
                            <div class="form-group">
                                <label>Date Range Picker</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control daterange-cus" name="production_date">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('production.index') }}" class="btn btn-secondary">Back</a>
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
    <!-- General JS Scripts -->
    {{-- <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
	<script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
	<script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('js/stisla.js') }}"></script> --}}

    <!-- JS Libraies -->
    {{-- <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
	<script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
	<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script> --}}
    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    {{-- <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script> --}}



    <script>
        $(".daterange-cus").daterangepicker({
            locale: {
                format: "YYYY-MM-DD"
            },
            drops: "down",
            opens: "right",
        });
        $(".daterange-btn").daterangepicker({
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [
                        moment().subtract(1, "days"),
                        moment().subtract(1, "days"),
                    ],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month"),
                    ],
                },
                startDate: moment().subtract(29, "days"),
                endDate: moment(),
            },
            function(start, end) {
                $(".daterange-btn span").html(
                    start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
                );
            }
        );
    </script>
@endpush
