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
                            <label for="name">Card Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$card->name}}">
                        </div>
                        <img src="{{asset('images/') . "/" . $card->logo}}" class="img-thumbnail mb-2" alt="Responsive logo" width="20%">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="logo-of-card">
                              <label class="custom-file-label" for="card-logo">Choose Logo</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="url">Card URL</label>
                            <input type="text" name="url" class="form-control" id="url" value="{{$card->url}}">
                        </div>

                        <div class="form-group">
                            <label for="multiple-currencies">Currencies</label>
                            <?php 
                            $selected_currencies = json_decode($card->currencies); 
                            ?>
                            <select multiple class="chosen" name="currencies[]" data-placeholder="Select Currencies...">
                                @foreach ($selected_currencies as $selected_currency)
                                    <option value="{{$selected_currency}}" selected> {{ strtoupper($selected_currency) }} </option>
                                @endforeach

                                @foreach ($currencies as $currency)
                                    @if (! in_array( strtolower($currency->name), $selected_currencies))
                                        <option value="{{strtolower($currency->name)}}"> {{ strtoupper($currency->name) }} </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple-countries">Countries</label>
                            <?php 
                            $selected_countries = json_decode($card->countries); 
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
                            <label for="multiple-payment">Payment Method</label>
                            <?php 
                            $selected_cardMethods = json_decode($card->payments); 
                            ?>
                            <select multiple name="payments[]" class="chosen" data-placeholder="Select Payment method...">
                                @foreach ($selected_cardMethods as $selected_cardMethod)
                                    <option value="{{$selected_cardMethod}}" selected> {{ strtoupper($selected_cardMethod) }} </option>
                                @endforeach

                                @foreach ($cardMethods as $cardMethod)
                                    @if (! in_array( strtolower($cardMethod->name), $selected_cardMethods))
                                        <option value="{{strtolower($cardMethod->name)}}"> {{ strtoupper($cardMethod->name) }} </option>
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
                            <input type="text" name="limit" class="form-control" id="Limit" value="{{ $card->limit }}">
                        </div>
                        <!-- New Column -->
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" id="price" value="{{ $card->price }}">
                        </div>
                        <div class="form-group">
                            <label for="delivery_fees">Delivery Fees</label>
                            <input type="text" name="delivery_fees" class="form-control" id="delivery_fees" value="{{ $card->delivery_fees }}">
                        </div>
                        <div class="form-group">
                            <label for="coverage">Coverage</label>
                            <input type="text" name="coverage" class="form-control" id="coverage" value="{{ $card->coverage }}">
                        </div>
                        <div class="form-group">
                            <label for="monthly_fees">Monthly Fees</label>
                            <input type="text" name="monthly_fees" class="form-control" id="monthly_fees" value="{{ $card->monthly_fees }}">
                        </div>
                        <div class="form-group">
                            <label for="atm_fees">Atm Fees</label>
                            <input type="text" name="atm_fees" class="form-control" id="atm_fees" value="{{ $card->atm_fees }}">
                        </div>
                        <div class="form-group">
                            <label for="monthly_atm_limit">Monthly Atm Limit</label>
                            <input type="text" name="monthly_atm_limit" class="form-control" id="monthly_atm_limit" value="{{ $card->monthly_atm_limit }}">
                        </div>
                        <div class="form-group">
                            <label for="online_purchases">Online Purchases</label>
                            <input type="text" name="online_purchases" class="form-control" id="online_purchases" value="{{ $card->online_purchases }}">
                        </div>
                        <div class="form-group">
                            <label for="monthly_purchases">Monthly Purchases</label>
                            <input type="text" name="monthly_purchases" class="form-control" id="monthly_purchases" value="{{ $card->monthly_purchases }}">
                        </div>
                        <!-- End Of New Column -->
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
    <script src="{{asset('js/chosen.jquery.js')}}"></script>
    <!-- ckeditor5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
    
    <script>
        
        $(document).ready(function(){

            // multiple select boxes plugin
            $(".chosen").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
            
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

            $('#logo-of-card').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

        });

    </script>

    
@endsection