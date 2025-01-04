@extends('layouts.app')

@section('title', 'Formula')

@push('style')
	<!-- CSS Libraries -->
	<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Formula Products</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
					<div class="breadcrumb-item"><a href="{{ route('brand.index') }}">Formula Products</a></div>
					<div class="breadcrumb-item">All Formula</div>
				</div>
			</div>
			<div class="section-body">
				<div class="row mt-4">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>All Formula</h4>
							</div>
							<div class="card-body">
								<div class="float-left">
									<div class="section-header-button">
										<a href="{{ route('formula.create') }}" class="btn btn-primary">Add New
											Formula Products</a>
									</div>
								</div>
								<div class="float-right">
									<select class="form-control selectric">
										<option>Action For Selected</option>
										<option>Move to Draft</option>
										<option>Move to Pending</option>
										<option>Delete Pemanently</option>
									</select>
								</div>

								<div class="clearfix mb-3"></div>

								<div class="table-responsive">
									<table class="table-striped table">
										<tr>
											<th>Nama Formula</th>
											{{-- <th>Nama Brand</th> --}}
											<th>Material</th>
											<th>Created At</th>
											<th>Action</th>
										</tr>
										@forelse ($formula as $formula)
											<tr>
												<td>
													{{ $formula->name }}
												</td>
												<td>
													<ul>
														@foreach ($formula->Material as $material)
															<li>{{ $material->name }}</li>
														@endforeach
													</ul>
													{{-- {{ $formula->Material->name }} --}}
												</td>
												{{-- <td>
													{{ $formula->phone }}
												</td> --}}
												<td>{{ $formula->created_at }}</td>
												<td>
													<div class="d-flex justify-content-center">
														<a href='{{ route('formula.show', $formula) }}' class="btn btn-sm btn-primary btn-icon">
															<i class="fas fa-edit"></i>
															Detail
														</a>
														<a href='{{ route('formula.edit', $formula->id) }}' class="btn btn-sm btn-success btn-icon ml-2">
															<i class="fas fa-edit"></i>
															Edit
														</a>

														<form action="{{ route('formula.destroy', $formula->id) }}" method="POST" class="ml-2">
															<input type="hidden" name="_method" value="DELETE" />
															<input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
								{{-- <div class="float-right">
									{{ $formula->withQueryString()->links() }}
								</div> --}}
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
