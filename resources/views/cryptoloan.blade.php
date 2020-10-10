@extends('layouts.cryptocutter-layout')

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-2">
                            <label><span class="text-dark font-weight-bold">Borrow</span></label>
                            <input type="text" class="find" id="find1" placeholder="Search Currency">
                        </div>
                        <div class="input-box mr-2">
                            <label><span class="text-dark font-weight-bold">In</span></label>
                            <input type="text" class="find" id="find2" placeholder="Search Country">
                        </div>
                        <div class="input-box">
                            <label><span class="text-dark font-weight-bold">With</span></label>
                            <input type="text" class="find" id="find3" placeholder="Search Collateral">
                            <a href="#" class="btn search-icon"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- end of searchbox -->
@endsection

@section('main-content')
    <section class="container-fluid pt-md-4 pt-3 px-md-5 px-2 main">
        <div class="row">
            <div class="col-12">
                <div class="separator">
                    Loans
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">BTC Only</th>
                            <th scope="col">Fiat Loan</th>
                            <th scope="col">Crypto Loan</th>
                            <th scope="col">Term</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Ease Of Use</th>
                            <th scope="col">Privacy</th>
                            <th scope="col">Speed</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Reputation</th>
                            <th scope="col">Limits</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr class="table-row">
                                    <td class="td-name">
                                        <?php $name= str_replace(' ', '_', $loan->name); ?>
                                        <a href="{{route('cryptoloan.show', $name )}}" class="text-dark text-nowrap"> <img src="{{asset('images/') . "/" . $loan->logo}}" class="rounded-circle" width="15%" alt="Logo"> {{$loan->name}}</a>
                                    </td>
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
                            @endforeach
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