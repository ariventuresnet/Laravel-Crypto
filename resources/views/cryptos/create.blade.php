@extends('admin.layout')

@section('custom-stylesheet')
<link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection

@section('main-content')

<section>
    <div class="container-fluid pt-5">
        <div class="row mt-3">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-md-8">

                        <div class="d-flex justify-content-end mb-2">
                            <div><a href="{{route('category.more')}}" class="btn btn-info px-3"> <i class="fas fa-long-arrow-alt-left text-white mr-2"></i>Back</a></div>
                        </div>
                        <!--Show flash Message -->
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }} font-weight-bold">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Add Cryptos
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                    
                                <form action="{{route('cryptos.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="currency">Cryptos Name</label>
                                        <select name="currency" class="chosen">
                                            <option value="">Select Name...</option>
                                            @foreach ($currencies as $currency)
                                                <option value="{{$currency->id}}">{{ strtoupper($currency->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="crypto_type">Type</label>
                                        <select name="crypto_type" class="chosen">
                                            <option value="">Select Type...</option>
                                            @foreach ($crypto_types as $crypto_type)
                                                <option value="{{$crypto_type->id}}">{{ strtoupper($crypto_type->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="market_cap">Market Cap</label>
                                        <input type="text" name="market_cap" class="form-control" id="market_cap" value="{{old('market_cap')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="algorithm">algorithm</label>
                                        <input type="text" name="algorithm" class="form-control" id="algorithm" value="{{old('algorithm')}}">
                                    </div>
            
                                    
            
                                    <div class="form-group">
                                        <label for="dominance">Dominance</label>
                                        <input type="text" name="dominance" class="form-control" id="dominance" value="{{old('dominance')}}">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom-script')
    <script src="{{asset('js/chosen.jquery.js')}}"></script>
    <script>
        
        $(document).ready(function(){
            
            // multiple select boxes plugin
            $(".chosen").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });         

        });

    </script>

    
@endsection