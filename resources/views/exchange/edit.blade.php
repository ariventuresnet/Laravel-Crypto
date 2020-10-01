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
                    <div class="h2 text-center font-weight-bold mb-3">
                        Update Exchange
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

                    <form action="{{route('exchanges.update', $exchange->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Exchange Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$exchange->name}}">
                        </div>
                        <img src="{{asset('images/') . "/" . $exchange->logo}}" class="img-thumbnail mb-2" alt="Responsive logo" width="20%">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="logo-of-exchange">
                              <label class="custom-file-label" for="exchange-logo">Choose Logo</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="url">Exchange URL</label>
                            <input type="text" name="url" class="form-control" id="url" value="{{$exchange->url}}">
                        </div>

                        <div class="form-group">
                            <label for="multiple-currencies">Currencies</label>
                            <?php 
                            $currencies = json_decode($exchange->currencies); 
                            $all_currency = ["bitcoin", "ethereum", "tether"];
                            ?>
                            <select multiple class="chosen" name="currencies[]" data-placeholder="Select Currencies...">
                                @foreach ($currencies as $selected_currency)
                                    <option value="{{$selected_currency}}" selected> {{ ucfirst($selected_currency) }} </option>
                                @endforeach

                                @foreach ($all_currency as $currency)
                                    @if (! in_array( $currency, $currencies))
                                        <option value="{{$currency}}"> {{ ucfirst($currency) }} </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple-countries">Countries</label>
                            <?php 
                            $countries = json_decode($exchange->countries); 
                            $all_country = ["china", "india", "usa", "indonesia", "brazil", "nigeria", "russia", "japan", "bangladesh"];
                            ?>
                            <select multiple name="countries[]" class="chosen" data-placeholder="Select Countries...">
                                @foreach ($countries as $selected_country)
                                    <option value="{{$selected_country}}" selected> {{ ucfirst($selected_country) }} </option>
                                @endforeach

                                @foreach ($all_country as $country)
                                    @if (! in_array( $country, $countries))
                                        <option value="{{$country}}"> {{ ucfirst($country) }} </option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple-payment">Payment Method</label>
                            <?php 
                            $payments = json_decode($exchange->payments); 
                            $payment_option = ["cash", "bank transfer", "credit card", "debit card", "ach tranfer"];
                            ?>
                            <select multiple name="payments[]" class="chosen" data-placeholder="Select Payment method...">
                                @foreach ($payments as $selected_payment)
                                    <option value="{{$selected_payment}}" selected> {{ ucwords($selected_payment) }} </option>
                                @endforeach

                                @foreach ($payment_option as $option)
                                    @if (! in_array( $option, $payments))
                                        <option value="{{$option}}"> {{ ucwords($option) }} </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3">{!! $exchange->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pros">Pros</label>
                            <textarea name="pros" id="pros" class="form-control" cols="30" rows="3">{!! $exchange->pros !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cons">Cons</label>
                            <textarea name="cons" id="cons" class="form-control" cols="30" rows="3">{!! $exchange->cons !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="ease">Ease Of Use</label>
                            <input type="text" name="ease" class="form-control" id="ease" value="{{ $exchange->ease }}">
                        </div>
                        <div class="form-group">
                            <label for="privacy">Privacy</label>
                            <input type="text" name="privacy" class="form-control" id="privacy" value="{{ $exchange->privacy }}">
                        </div>
                        <div class="form-group">
                            <label for="speed">Speed</label>
                            <input type="text" name="speed" class="form-control" id="speed" value="{{ $exchange->speed }}">
                        </div>
                        <div class="form-group">
                            <label for="fee">Fees</label>
                            <input type="text" name="fee" class="form-control" id="fee" value="{{ $exchange->fee }}">
                        </div>
                        <div class="form-group">
                            <label for="reputation">Reputation</label>
                            <input type="text" name="reputation" class="form-control" id="reputation" value="{{ $exchange->reputation }}">
                        </div>
                        <div class="form-group">
                            <label for="Limit">Limits</label>
                            <input type="text" name="limit" class="form-control" id="Limit" value="{{ $exchange->limit }}">
                        </div>
                        <!-- New Field -->
                        <div class="form-group">
                            <label for="bitcoin_only">Bitcoin Only</label>
                            <input type="text" name="bitcoin_only" class="form-control" id="bitcoin_only" value="{{ $exchange->bitcoin_only }}">
                        </div>
                        <div class="form-group">
                            <label for="recurring_buys">Recurring Buys</label>
                            <input type="text" name="recurring_buys" class="form-control" id="recurring_buys" value="{{ $exchange->recurring_buys }}">
                        </div>
                        <div class="form-group">
                            <label for="lightning">Lightning</label>
                            <input type="text" name="lightning" class="form-control" id="lightning" value="{{ $exchange->lightning }}">
                        </div>
                        <div class="form-group">
                            <label for="liquid">Liquid</label>
                            <input type="text" name="liquid" class="form-control" id="liquid" value="{{ $exchange->liquid }}">
                        </div>
                        <div class="form-group">
                            <label for="kyc">KYC</label>
                            <input type="text" name="kyc" class="form-control" id="kyc" value="{{ $exchange->kyc }}">
                        </div>
                        <!-- End Of New Field -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-style draw-border text-uppercase mb-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection

@section('custom-script')
    <!-- ckeditor5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('js/chosen.jquery.js')}}"></script>
    
    <script>
        // $("#description").focus(function(){});
        
        $(document).ready(function(){

            if($('#description').length ){
                ClassicEditor
                .create( document.querySelector( '#description' ) )
                .catch( error => {
                    console.error( error );
                } );
            }

            if($('#pros').length ){
                ClassicEditor
                .create( document.querySelector( '#pros' ) )
                .catch( error => {
                    console.error( error );
                } );
            }

            if($('#cons').length ){
                ClassicEditor
                .create( document.querySelector( '#cons' ) )
                .catch( error => {
                    console.error( error );
                } );
            }


            // multiple select boxes plugin
            $(".chosen").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });

            $('#logo-of-exchange').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });
            
        });

    </script>

    
@endsection