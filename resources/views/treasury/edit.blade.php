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
                        Update Treasury
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
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>

                    <form action="{{route('treasuries.update', $treasury->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$treasury->name}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="filings">Filings</label>
                            <input type="text" name="filings" class="form-control" id="filings" value="{{$treasury->filings}}">
                        </div>

                        <div class="form-group">
                            <label for="multiple-countries">Countries</label>
                            <?php 
                            $selected_countries = json_decode($treasury->countries); 
                            ?>
                            <select multiple name="countries[]" class="chosen" data-placeholder="Select Countries...">
                                @foreach ($selected_countries as $selected_country)
                                    <option value="{{$selected_country}}" selected> {{ strtoupper($selected_country) }} </option>
                                @endforeach

                                @foreach ($countries as $country)
                                    @if (! in_array( strtolower($country->name), $selected_countries))
                                        <option value="{{strtolower($country->name)}}"> {{ strtoupper($country->name) }} </option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="symbol">Symbol</label>
                            <input type="text" name="symbol" class="form-control" id="symbol" value="{{$treasury->symbol}}">
                        </div>
                        <div class="form-group">
                            <label for="btc_holding">BTC Holdings</label>
                            <input type="text" name="btc_holding" class="form-control" id="btc_holding" value="{{$treasury->btc_holding}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                @if ($treasury->status == 1)
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                @else
                                    <option value="1">Active</option>
                                    <option value="0" selected>Inactive</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-style draw-border mb-3">update</button>
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