@extends('layouts.app')

@section('title', 'Detail Products')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></div>
                    <div class="breadcrumb-item">Detail Products</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Products</h4>
                            </div>
                            <div class="card-body">
                                {{-- <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('product.create') }}" class="btn btn-outline-primary">Add New
                                            Products</a>
                                    </div>
                                </div> --}}
                                {{-- <div class="float-right">
                                    <form method="GET" action="{{ route('product.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}

                                {{-- <div class="clearfix mb-3"></div> --}}
                                <h5>{{ $products->name }}</h5>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            {{-- <th>Nama product</th> --}}
                                            {{-- <th>Image</th> --}}
                                            <th>Category</th>
                                            {{-- <th>Price</th> --}}
                                            <th>Created At</th>
                                            {{-- <th class="align-center">Action</th> --}}
                                        </tr>
                                        @foreach ($products->category as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $category->name }}
                                                </td>

                                                {{-- <td>{{ $products->price }}</td> --}}
                                                <td>{{ $category->created_at }}</td>


                                            </tr>
                                            {{-- @empty
                                            <p class="d-flex justify-content-center align-items-center section-title">
                                                <span class="text-center text-danger">Silahkan Tambah Product</span>
                                            </p> --}}
                                        @endforeach

                                    </table>
                                </div>
                                {{-- <div class="float-right">
                                    {{ $products->withQueryString()->links() }}
                                </div> --}}
                                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    @stack('scripts')
@endpush
