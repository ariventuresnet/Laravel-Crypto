@extends('admin.layout')

@section('custom-stylesheet')
<link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection

@section('main-content')

<section>
    <div class="row pt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-6 px-5">
                    <div class="h2 text-center font-weight-bold my-3">
                        Add Treasury
                    </div>
                    <!--Show Validation Error -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--Show flash Message -->
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }} font-weight-bold">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>

                    <form action="{{route('treasuries.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="company name">
                        </div>
                        
                        <div class="form-group">
                            <label for="filings">Filings</label>
                            <input type="text" name="filings" class="form-control" id="filings" value="{{old('filings')}}" placeholder="filings url">
                        </div>

                        <div class="form-group">
                            <label for="multiple-countries">Countries</label>
                            <select multiple name="countries[]" class="chosen" data-placeholder="Select Countries...">
                                @foreach ($countries as $country)
                                    <option value="{{strtolower($country->name)}}">{{ strtoupper($country->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="symbol">Symbol</label>
                            <input type="text" name="symbol" class="form-control" id="symbol" value="{{old('symbol')}}" placeholder="symbol">
                        </div>
                        <div class="form-group">
                            <label for="btc_holding">BTC Holdings</label>
                            <input type="text" name="btc_holding" class="form-control" id="btc_holding" value="{{old('btc_holding')}}" placeholder="Btc holding">
                        </div>
                        
                        <div class="">
                            <button type="submit" class="btn btn-style draw-border mb-3">Add Treasury</button>
                        </div>
                    </form>
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