@extends('layouts.app')

@section('title', 'Detail Formula')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Formula</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('product.index') }}">Formula</a></div>
                    <div class="breadcrumb-item">Detail Formula</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Formula</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <div class="section-header-button">
                                        <button class="btn btn-primary shadow" data-toggle="modal"
                                            data-target="#modal-konsentrasi">Tambah
                                            Konsentrasi</button>
                                    </div>
                                </div>
                                <div class="float-left">
                                    <h5>{{ $formulas->name }}</h5>
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Material</th>
                                            <th>Concentration</th>
                                            <th>Amount</th>
                                            <th>Sub Amount@pot</th>
                                        </tr>
                                        @foreach ($formulas->Material as $material)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $material->name }}</td>
                                                <td>{{ $material->pivot->concentration }} %</td>
                                                <td class="harga">{{ $material->pivot->concentration / 100 }} g</td>
                                                <td class="total">0</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Total : {{ $total }} %</th>
                                            <th>Amount : {{ $total_amount }} g </th>
                                            <th id="total-harga"></th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-3">
                                    <h6>Jumlah Pot</h6>
                                    <input type="number" class="form-control" id="jumlah" value="">
                                    <button onclick="kalikan()" class="btn btn-success mt-3">Hitung</button>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('formula.index') }}" class="btn btn-primary">Back</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<div class="modal part" id="modal-konsentrasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Konsentrasi</h5>
                <button type="button" class="btn-close" data-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form id="modal-konsentrasi" method="POST" action="{{ route('formula.update', $formulas) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="float-left">
                            <label>Nama Material</label>
                            @foreach ($formulas->Material as $material)
                                <div class="input-group">
                                    <input type="text" class="form-control mb-2" name="material" id="material"
                                        value="{{ $material->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <label>Konsentrasi</label>
                            @foreach ($formulas->Material as $material)
                                <div class="input-group">
                                    <input type="number" class="form-control mb-2" name="concentration"
                                        id="concentration" value="{{ $material->pivot->concentration }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="float-right mt-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@push('scripts')
    <script>
        function kalikan() {
            // Ambil nilai jumlah dari input
            const jumlah = document.getElementById('jumlah').value;
            // Ambil semua elemen dengan class 'harga' yang ada di dalam tabel
            const hargaElements = document.querySelectorAll('.harga');
            const totalElements = document.querySelectorAll('.total');
            let totalPerkalian = 0;
            // Loop melalui setiap elemen harga dan hitung totalnya
            for (let i = 0; i < hargaElements.length; i++) {
                const harga = parseFloat(hargaElements[i].innerText); // Ambil harga dan ubah menjadi angka
                const total = harga * jumlah; // Kalikan harga dengan jumlah
                totalElements[i].innerText = total + ' g'; // Masukkan total ke kolom Total

                totalPerkalian += total;

                document.getElementById('total-harga').textContent = 'Sub Amount : ' +
                    totalPerkalian + ' g';
            }
        }
        kalikan();;
    </script>
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="http://127.0.0.1:8001/js/page/bootstrap-modal.js"></script>

    @stack('scripts')
@endpush
