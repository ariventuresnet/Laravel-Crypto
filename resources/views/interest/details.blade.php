@extends('layouts.cryptocutter-layout')

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-sm-4">
                            <label><span class="text-dark font-weight-bold">Earn Interest With</span></label>
                            <input type="text" class="find" id="find1" placeholder="Search Deposit">
                        </div>
                        <div class="input-box ml-sm-4">
                            <label><span class="text-dark font-weight-bold">In</span></label>
                            <input type="text" class="find" id="find2" placeholder="Search Country">
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
    <section class="container mt-5 main">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="">
                    <h2 class="mb-4 d-md-inline">
                        <img src="{{asset('images/') . "/" . $interest->logo}}" class="img-fluid rounded" alt="logo" width="120px">
                        <span class="text-uppercase font-weight-bold">{{$interest->name}}</span>
                    </h2>
                    <span class="d-inline float-sm-right my-4"><a href="{{$interest->url}}" class="btn btn-success font-weight-bold px-4 py-2">Get account</a></span>
                </div>
                <p class="mb-3">{!! $interest->description !!}</p>
                <div class="row mb-5">
                    <div class="col-sm-6 mb-2">
                        <h3>Pros</h3>
                        <p>{!! $interest->pros !!}</p>
                    </div>
                    <div class="col-sm-6">
                        <h3>Cons</h3>
                        <p>{!! $interest->cons !!}</p>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>BTC Only</th>
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
                                <td>{{$interest->btc_only}}</td>
                                <td>{{$interest->term}}</td>
                                <td>{{$interest->interest}}</td>
                                <td>{{$interest->ease}}</td>
                                <td>{{$interest->privacy}}</td>
                                <td>{{$interest->speed}}</td>
                                <td>{{$interest->fee}}</td>
                                <td>{{$interest->reputation}}</td>
                                <td>{{$interest->limit}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    @include('interest.suggestion')
@endsection