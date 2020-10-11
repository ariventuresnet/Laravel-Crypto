@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        .table th{
            font-size: .8rem;
        }
        .table-row{
            font-size: .8rem;
        }
    </style>
@endsection

@section('searchbox-content')
    <!-- searchbox -->
    <div class="container-fluid searchbox px-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-row d-flex justify-content-center">
                        <div class="input-box mr-2">
                            <label><span class="text-dark font-weight-bold">USE</span></label>
                            <input type="text" class="find" id="find1" placeholder="Search Cryptocurrency">
                        </div>
                        <div class="input-box mr-2">
                            <label><span class="text-dark font-weight-bold">IN</span></label>
                            <input type="text" class="find" id="find2" placeholder="Search Country">
                        </div>
                        <div class="input-box">
                            <label><span class="text-dark font-weight-bold">WITH</span></label>
                            <input type="text" class="find" id="find3" placeholder="Search Card Method">
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
                    Top Cards
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Ease Of Use</th>
                            <th scope="col">Privacy</th>
                            <th scope="col">Speed</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Reputation</th>
                            <th scope="col">Limits</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delivery Fees</th>
                            <th scope="col">Coverage</th>
                            <th scope="col">Monthly Fees</th>
                            <th scope="col">ATM Fees</th>
                            <th scope="col">Monthly ATM Limit</th>
                            <th scope="col">Online Purchases</th>
                            <th scope="col">Monthly Purchases</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($cards as $card)
                                <tr class="table-row">
                                    <td class="td-name">
                                        <?php $name= str_replace(' ', '_', $card->name); ?>
                                        <a href="{{route('cryptocard.show', $name )}}" class="text-dark text-nowrap"> <img src="{{asset('images/') . "/" . $card->logo}}" class="rounded-circle" width="15%" alt="Logo"> {{$card->name}}</a>
                                    </td>
                                    <td>{{$card->ease}}</td>
                                    <td>{{$card->privacy}}</td>
                                    <td>{{$card->speed}}</td>
                                    <td>{{$card->fee}}</td>
                                    <td>{{$card->reputation}}</td>
                                    <td>{{$card->limit}}</td>
                                    <td>{{$card->price}}</td>
                                    <td>{{$card->delivery_fees}}</td>
                                    <td>{{$card->coverage}}</td>
                                    <td>{{$card->monthly_fees}}</td>
                                    <td>{{$card->atm_fees}}</td>
                                    <td>{{$card->monthly_atm_limit}}</td>
                                    <td>{{$card->online_purchases}}</td>
                                    <td>{{$card->monthly_purchases}}</td>
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
    @include('card.suggestion')
    <script>
        $('#card').addClass('current');
    </script>
@endsection