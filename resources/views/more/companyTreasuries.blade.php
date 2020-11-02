@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        .search-icon{
            top : 60%;
        }
    </style>
@endsection

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form id="search-form">
                    <div class="d-flex justify-content-center">
                        <div class="input-box">
                            <input type="text" name="country" id="find1" placeholder="Search Country">
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
    <section class="container-fluid py-md-4 pt-3 px-md-5 px-2 main">
        <div class="row">
            <div class="col-12">
                <div class="separator">
                    Company Treasuries
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Country</th>
                            <th scope="col">Filings</th>
                            <th scope="col">Symbol</th>
                            <th scope="col">BTC Holdings</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($treasuries as $treasury)
                                <tr>
                                    <td class="font-weight-bold">{{$treasury->name}}</td>
                                    <td>{{$treasury->country->name}}</td>
                                    <td><a href="{{$treasury->filings}}" target="_blank">Link</a></td>
                                    <td>{{$treasury->symbol}}</td>
                                    <td>{{$treasury->btc_holding}}</td>
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
    @include('treasury.suggestion')
    @include('treasury.ajax_request')
@endsection