@extends('layouts.app')

@section('title', 'Brands Product')

@push('style')
	<!-- CSS Libraries -->
	<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Brand Products</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
					<div class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brand Products</a></div>
					<div class="breadcrumb-item">All Brands</div>
				</div>
			</div>
			<div class="section-body">
				<div class="row mt-4">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>All Brand Product</h4>
							</div>
							<div class="card-body">
								<div class="float-left">
									<div class="section-header-button">
										<a href="{{ route('brand.create') }}" class="btn btn-outline-primary">Add New
											Brand Products</a>
									</div>
								</div>
								<div class="float-right">
									<form method="GET" action="{{ route('brand.index') }}">
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

											<th>Nama Brand</th>
											<th>Alamat</th>
											<th>Phone</th>
											<th>Created At</th>
											<th>Action</th>
										</tr>
										@foreach ($brand_products as $brand)
											<tr>

												<td>{{ $brand->name }}
												</td>
												<td>
													{{ $brand->alamat }}
												</td>
												<td>
													{{ $brand->phone }}
												</td>
												<td>{{ $brand->created_at }}</td>
												<td>
													<div class="d-flex justify-content-center">
														<a href='{{ route('brand.edit', $brand->id) }}' class="btn btn-sm btn-success btn-icon">
															<i class="fas fa-edit"></i>
															Edit
														</a>

														<form action="{{ route('brand.destroy', $brand->id) }}" method="POST" class="ml-2">
															<input type="hidden" name="_method" value="DELETE" />
															<input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
									{{ $brand_products->withQueryString()->links() }}
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
