@extends('layouts.app')
@section('title', 'Material')
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
                            <h4>Material Formula</h4>
                            {{-- <h1>{{ $formulas->name }}</h1> --}}
                            {{-- <h1>{{ $materials->name }}</h1> --}}
                        </div>
                        <div class="card-body">
                            <div class="float-right">



                                <select class="form-control selectric">
                                    <option>Pilih Formula</option>
                                    @foreach ($formulas as $formula)
                                        <option value="{{ $formula->id }}">{{ $formula->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>No</th>
                                        <th>Name Material</th>
                                        <th>Concentration</th>
                                        <th>Amount</th>

                                    </tr>
                                    {{-- @if ($formulas->id) --}}

                                    @foreach ($formula->Material as $material)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $material->name }}
                                            </td>
                                            <td>
                                                {{ $material->concentration }} %
                                            </td>
                                            <td>
                                                {{ $material->concentration / 100 }} g

                                            </td>

                                        </tr>
                                    @endforeach
                                    {{-- @endif --}}


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Calculation Results</h4>

                        </div>

                        <div class="card-body">
                            <div class="float-right">
                                <button class="btn btn-primary">Hitung</button>
                            </div>
                            <div class="clearfix mb-3"></div>
                            {{-- <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>No</th>
                                        <th>Name Material</th>
                                        <th>Concentration</th>
                                        <th>Amount</th>

                                    </tr>
                                    @foreach ($material as $material)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $material->name }}
                                            </td>
                                            <td>
                                                {{ $material->concentration }} %
                                            </td>
                                            <td>
                                                {{ $material->concentration / 100 }} g

                                            </td>

                                        </tr>
                                    @endforeach


                                </table>
                            </div> --}}
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
