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
                            <div><a href="{{route('treasuries.index')}}" class="btn btn-info px-3"> <i class="fas fa-long-arrow-alt-left text-white mr-2"></i>Back</a></div>
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
                                Update Treasury
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
                                        <label for="country">Countries</label>               
                                        <select name="country_id" class="chosen">
                                            @foreach ($countries as $country)
                                                @if ($country->id == $treasury->country_id )
                                                    <option value="{{$country->id}}" selected> {{ strtoupper($country->name) }} </option>
                                                @else
                                                    <option value="{{$country->id}}"> {{ strtoupper($country->name) }} </option>
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
                                    
                                    <button type="submit" class="btn btn-primary">Update</button>

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