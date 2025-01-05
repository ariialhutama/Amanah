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
								{{-- <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('product.create') }}" class="btn btn-outline-primary">Add New
                                            Products</a>
                                    </div>
                                </div> --}}
								{{-- <div class="float-right">
                                    
                                </div> --}}

								<h5>{{ $formulas->name }}</h5>
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
										{{-- @php
											$total = SUM($material->concentration);
										@endphp --}}

										@foreach ($formulas->Material as $material)
											<tr>
												<td>{{ $loop->iteration }}</td>

												<td>
													{{ $material->name }}
												</td>
												<td>{{ $material->concentration }} %</td>
												<td name="sub_amount" value="{{ isset($sub_amount) ? $sub_amount : '' }}">
													{{ $material->concentration / 100 }} g</td>
												<td value="0"></td>
												{{-- <td name="hitung" value="{{ isset($hitung) ? $hitung : '' }}"></td> --}}
											</tr>
										@endforeach
										<tr>
											<th></th>
											<th></th>
											<th>Total : {{ $total }} %</th>
											<th>Total Amount : {{ $total_amount }} g </th>
											{{-- @php
													$total = 0;
												@endphp --}}

										</tr>
									</table>
								</div>
								<div class="form-group mt-3">
									<form action="/hitung" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<h6>Jumlah Pot</h6><input type="number" class="form-control" name="pot"
											value="{{ isset($pot) ? $pot : '0' }}">X
										<h6>Jumlah Sub Amount</h6><input type="number" class="form-control" name="sub_amount"
											value="{{ isset($sub_amount) ? $sub_amount : '' }}">
										<h6>Hasil</h6><input type="number" class="form-control" name="hitung"
											value="{{ isset($hitung) ? $hitung : '' }}">
										{{-- <input type="submit" value="=">(proses) --}}
										<button type="submit" value="proses" class="btn btn-success mt-3">Hitung</button>
									</form>
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

@push('scripts')
	<!-- JS Libraies -->
	<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

	<!-- Page Specific JS File -->
	<script src="{{ asset('js/page/features-posts.js') }}"></script>

	@stack('scripts')
@endpush
