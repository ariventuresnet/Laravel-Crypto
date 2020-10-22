@extends('layouts.cryptocutter-layout')

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form id="search-form">
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-sm-4">
                            <label><span class="text-dark font-weight-bold">Earn Interest With</span></label>
                            <input type="text" name="deposit" id="find1" placeholder="Search Deposit">
                        </div>
                        <div class="input-box ml-sm-4">
                            <label><span class="text-dark font-weight-bold">In</span></label>
                            <input type="text" name="country" id="find2" placeholder="Search Country">
                            <button id="search" class="btn search-icon"><i class="fas fa-search"></i></button>
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
                    {{ \Request::is('interests') ? "Interest Accounts" : "Search Result" }}
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">BTC Only</th>
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
                            @foreach ($interests as $interest)
                                <tr class="table-row">
                                    <td class="td-name">
                                        <?php $name= str_replace(' ', '_', $interest->name); ?>
                                        <a href="{{route('cryptointerest.show', $name )}}" class="text-dark text-nowrap"> <img src="{{asset('images/') . "/" . $interest->logo}}" class="rounded-circle" width="15%" alt="Logo"> {{$interest->name}}</a>
                                    </td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('custom-script')
    @include('interest.suggestion')
    @include('interest.ajax_request')
@endsection