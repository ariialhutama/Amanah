@extends('layouts.app')

@section('title', 'Product')

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
                    <div class="breadcrumb-item">All Products</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('product.create') }}" class="btn btn-outline-primary">Add New
                                            Products</a>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('product.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Nama product</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @forelse ($products as $product)
                                            <tr>

                                                <td>{{ $product->name }}
                                                </td>
                                                {{-- <td>
                                                    {{ $product->image }}
                                                </td> --}}
                                                <td>
                                                    <ul>
                                                        @foreach ($product->Category as $category)
                                                            <a href="{{ route('formula.index') }}"
                                                                class="badge badge-primary">{{ $category->name }}</a>
                                                        @endforeach
                                                    </ul>
                                                    {{-- {{ $product->Category->name }} --}}
                                                </td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('product.show', $product) }}'
                                                            class="btn btn-sm btn-primary btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Detail
                                                        </a>
                                                        <a href='{{ route('product.edit', $product) }}'
                                                            class="btn btn-sm btn-success btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('product.destroy', $product) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <p class="d-flex justify-content-center align-items-center section-title">
                                                <span class="text-center text-danger">Silahkan Tambah Product</span>
                                            </p>
                                        @endforelse
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $products->withQueryString()->links() }}
                                </div>
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

    @stack('scripts      ')
@endpush
