@extends('layouts.app')

@section('title', 'Materials')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Materials Product</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('production.index') }}">Production</a></div>
                    <div class="breadcrumb-item">All Materials</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Materials Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('material.create') }}" class="btn btn-primary">Add New
                                            Material</a>
                                        <button class="btn btn-success shadow" data-toggle="modal"
                                            data-target="#modal-material">Import Material
                                        </button>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('material.index') }}">
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
                                            <th>No</th>
                                            <th>Name Material</th>


                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($material_products as $material)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $material->name }}
                                                </td>

                                                <td>{{ $material->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('material.edit', $material->id) }}'
                                                            class="btn btn-sm btn-success btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('material.destroy', $material->id) }}"
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
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $material_products->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<div class="modal part" id="modal-material">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Material</h5>
                <button type="button" class="btn-close" data-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form id="modal-konsentrasi" method="POST" action="{{ route('material.import-proses') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="table-striped table">
                        {{-- Name --}}
                        <div class="form-group">
                            <label>Import Material</label>
                            <input type="file" class="form-control" name="file" autofocus>
                        </div>
                    </div>
                    <div class="float-right mt-3">
                        <button class="btn btn-primary" type="submit">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <script src="http://127.0.0.1:8001/js/page/bootstrap-modal.js"></script>

    @stack('scripts      ')
@endpush
