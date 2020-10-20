@extends('layouts.cryptocutter-layout')

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('loans.search')}}" method="POST">
                    @csrf
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-2">
                            <label><span class="text-dark font-weight-bold">Borrow</span></label>
                            <input type="text" name="currency" id="find1" placeholder="Search Currency">
                        </div>
                        <div class="input-box mr-2">
                            <label><span class="text-dark font-weight-bold">In</span></label>
                            <input type="text" name="country" id="find2" placeholder="Search Country">
                        </div>
                        <div class="input-box">
                            <label><span class="text-dark font-weight-bold">With</span></label>
                            <input type="text" name="collateral" id="find3" placeholder="Search Collateral">
                            <button type="submit" class="btn search-icon"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- end of searchbox -->
@endsection

@section('main-content')
    <section class="container mt-5 main">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="">
                    <h2 class="mb-4 d-md-inline">
                        <img src="{{asset('images/') . "/" . $loan->logo}}" class="img-fluid rounded" alt="logo" width="120px">
                        <span class="text-uppercase font-weight-bold">{{$loan->name}}</span>
                    </h2>
                    <span class="d-inline float-sm-right my-4"><a href="{{$loan->url}}" class="btn btn-success font-weight-bold px-4 py-2">Get Loan</a></span>
                </div>
                <p class="mb-3">{!! $loan->description !!}</p>
                <div class="row mb-5">
                    <div class="col-sm-6 mb-2">
                        <h3>Pros</h3>
                        <p>{!! $loan->pros !!}</p>
                    </div>
                    <div class="col-sm-6">
                        <h3>Cons</h3>
                        <p>{!! $loan->cons !!}</p>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>BTC Only</th>
                                <th>Fiat Loan</th>
                                <th>Crypto Loan</th>
                                <th>Term</th>
                                <th>Interest</th>
                                <th>Ease Of Use</th>
                                <th>Privacy</th>
                                <th>Speed</th>
                                <th>Fees</th>
                                <th>Reputation</th>
                                <th>Limits</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$loan->btc_only}}</td>
                                <td>{{$loan->fiat_loan}}</td>
                                <td>{{$loan->crypto_loan}}</td>
                                <td>{{$loan->term}}</td>
                                <td>{{$loan->interest}}</td>
                                <td>{{$loan->ease}}</td>
                                <td>{{$loan->privacy}}</td>
                                <td>{{$loan->speed}}</td>
                                <td>{{$loan->fee}}</td>
                                <td>{{$loan->reputation}}</td>
                                <td>{{$loan->limit}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    @include('loan.suggestion')
@endsection