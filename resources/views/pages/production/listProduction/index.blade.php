@extends('layouts.app')

@section('title', 'List Production')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Production</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('brand.index') }}">List Production</a></div>
                    <div class="breadcrumb-item">All Production</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Production</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('production.create') }}" class="btn btn-primary">Add New
                                            list Production</a>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <select class="form-control selectric">
                                        <option>-- Pilih Formula --</option>
                                        {{-- @foreach ($formulas as $formula)
                                            <option value="{{ $formula->id }}">{{ $formula->name }}</option>
                                        @endforeach --}}

                                    </select>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Nama Brand</th>
                                            <th>Nama Product</th>
                                            <th>Jumlah</th>
                                            <th>Kemasan</th>
                                            <th>Berat_Isi</th>
                                            <th>Status</th>
                                            <th>Tanggal Produksi</th>
                                            <th>Action</th>
                                        </tr>
                                        @forelse ($productions as $production)
                                            <tr>
                                                <td>
                                                    {{ $production->Brand->name }}
                                                </td>
                                                <td>
                                                    {{ $production->Product->name }}
                                                    {{-- <ul>
														@foreach ($production->Product as $product)
															<li>{{ $product->name }}</li>
														@endforeach
													</ul> --}}

                                                </td>
                                                <td>{{ $production->quantity }}</td>
                                                <td>{{ $production->packaging }}</td>
                                                <td>{{ $production->content_weight }}</td>
                                                <td>{{ $production->status }}</td>
                                                <td>{{ $production->production_date }}</td>

                                                {{-- <td>{{ $production->created_at }}</td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('production.show', $production) }}'
                                                            class="btn btn-sm btn-primary btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Detail
                                                        </a>
                                                        <a href='{{ route('production.edit', $production->id) }}'
                                                            class="btn btn-sm btn-success btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('production.destroy', $production->id) }}"
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
                                    {{-- {{ $formulas->withQueryString()->links() }} --}}
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
