@extends('layouts.app')
@section('title', 'Production')
@push('style')
    {{-- CSS --}}
@endpush
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Production</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered table-md table">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Konsentrasi</th>
                                        <th>Jumlah/g</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Irwansyah Saputra</td>
                                        <td>2017-01-09</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Hasan Basri</td>
                                        <td>2017-01-09</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kusnadi</td>
                                        <td>2017-01-11</td>
                                        <td>
                                            <div class="badge badge-danger">Not Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Rizal Fakhri</td>
                                        <td>2017-01-11</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered table-md table">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bahan</th>
                                        <th>Konsentrasi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Irwansyah Saputra</td>
                                        <td>2017-01-09</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Hasan Basri</td>
                                        <td>2017-01-09</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kusnadi</td>
                                        <td>2017-01-11</td>
                                        <td>
                                            <div class="badge badge-danger">Not Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Rizal Fakhri</td>
                                        <td>2017-01-11</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
@push('scripts')
    {{-- JavaScript --}}
@endpush
