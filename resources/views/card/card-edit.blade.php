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
                        Update Card
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

                    <form action="{{route('cards.update', $card->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Exchange Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$card->name}}">
                        </div>
                        <img src="{{asset('images/') . "/" . $card->logo}}" class="img-thumbnail mb-2" alt="Responsive logo" width="20%">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="card-logo">
                              <label class="custom-file-label" for="card-logo">Choose Logo</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="url">Exchange URL</label>
                            <input type="text" name="url" class="form-control" id="url" value="{{$card->url}}">
                        </div>

                        <div class="form-group">
                            <label for="multiple-currencies">Currencies</label>
                            <?php 
                            $currencies = json_decode($card->currencies); 
                            $all_currency = ["bitcoin", "ethereum", "tether", "litecoin"];
                            ?>
                            <select multiple class="chosen-countries" name="currencies[]" data-placeholder="Select Currencies...">
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
                            $countries = json_decode($card->countries); 
                            $all_country = ["china", "india", "usa", "indonesia", "brazil", "nigeria", "russia", "japan", "bangladesh"];
                            ?>
                            <select multiple name="countries[]" class="chosen-countries" data-placeholder="Select Countries...">
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
                            $payments = json_decode($card->payments); 
                            $payment_option = ["visa", "mastercard", "union pay"];
                            ?>
                            <select multiple name="payments[]" class="chosen-payments" data-placeholder="Select Payment method...">
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
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3">{!! $card->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pros">Pros</label>
                            <textarea name="pros" id="pros" class="form-control" cols="30" rows="3">{!! $card->pros !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cons">Cons</label>
                            <textarea name="cons" id="cons" class="form-control" cols="30" rows="3">{!! $card->cons !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="ease">Ease Of Use</label>
                            <input type="text" name="ease" class="form-control" id="ease" value="{{ $card->ease }}">
                        </div>
                        <div class="form-group">
                            <label for="privacy">Privacy</label>
                            <input type="text" name="privacy" class="form-control" id="privacy" value="{{ $card->privacy }}">
                        </div>
                        <div class="form-group">
                            <label for="speed">Speed</label>
                            <input type="text" name="speed" class="form-control" id="speed" value="{{ $card->speed }}">
                        </div>
                        <div class="form-group">
                            <label for="fee">Fees</label>
                            <input type="text" name="fee" class="form-control" id="fee" value="{{ $card->fee }}">
                        </div>
                        <div class="form-group">
                            <label for="reputation">Reputation</label>
                            <input type="text" name="reputation" class="form-control" id="reputation" value="{{ $card->reputation }}">
                        </div>
                        <div class="form-group">
                            <label for="Limit">Limits</label>
                            <input type="text" name="limit" class="form-control" id="Limit" value="{{ $card->limit}}">
                        </div>
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
            $(".chosen-countries").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
            $(".chosen-countries").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
            $(".chosen-payments").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });



        });

    </script>

    
@endsection