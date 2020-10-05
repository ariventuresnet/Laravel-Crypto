@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        header {
            height          : 90vh;
            background      :  #fff;
        }
        /* .donate{
            display: none;
        } */
        .donate{
            margin : 0;
            padding: 0;
        }
        .btc{
            position : absolute;
            top:33%;
            width: 100%;
        }
        
    </style>
@endsection

@section('main-content')

    <div class="btc text-center mt-3">
        <p class="font-weight-bold">BTC Address: 3NKpsiJwKwQd5qaWWuiHtwGQejCiFUjKHn</p>
        <img src="{{asset('images/donate.jpg')}}" class="img-fluid" alt="Donate" width="250">
    </div>
@endsection