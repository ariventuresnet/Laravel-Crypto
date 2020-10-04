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
                        Update Wallet
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

                    <form action="{{route('wallets.update', $wallet->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$wallet->name}}">
                        </div>
                        <img src="{{asset('images/') . "/" . $wallet->logo}}" class="img-thumbnail mb-2" alt="Responsive logo" width="20%">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="logo-of-wallet">
                              <label class="custom-file-label" for="loan-logo">Choose Logo</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" id="url" value="{{$wallet->url}}">
                        </div>

                        <div class="form-group">
                            <label for="multiple-currencies">Currencies</label>
                            <?php 
                            $currencies = json_decode($wallet->currencies); 
                            $all_currency = ["BTC", "ETH", "BNB", "XRP", "LTC", "EOS", "XLM", "LINK" ,"TRX", "USDT", "USDC", "BUSD"];
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
                            <label for="multiple-types">Types</label>
                            <?php 
                            $types = json_decode($wallet->type); 
                            $all_type = ["hardware", "iOS", "android", "mac", "windows", "web"];
                            ?>
                            <select multiple name="type[]" class="chosen" data-placeholder="Select types...">
                                @foreach ($types as $selected_type)
                                    <option value="{{$selected_type}}" selected> {{ ucfirst($selected_type) }} </option>
                                @endforeach

                                @foreach ($all_type as $type)
                                    @if (! in_array( $type, $types))
                                        <option value="{{$type}}"> {{ ucfirst($type) }} </option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3">{!! $wallet->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pros">Pros</label>
                            <textarea name="pros" id="pros" class="form-control" cols="30" rows="3">{!! $wallet->pros !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cons">Cons</label>
                            <textarea name="cons" id="cons" class="form-control" cols="30" rows="3">{!! $wallet->cons !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="btc-only">BTC Only</label>
                            <input type="text" name="btc_only" class="form-control" id="btc-only" value="{{ $wallet->btc_only }}">
                        </div>
                        <div class="form-group">
                            <label for="fiat-loan">Lightning</label>
                            <input type="text" name="lightning" class="form-control" id="fiat-loan" value="{{ $wallet->lightning }}">
                        </div>
                        <div class="form-group">
                            <label for="liquid">Liquid</label>
                            <input type="text" name="liquid" class="form-control" id="liquid" value="{{ $wallet->liquid }}">
                        </div>
                        <div class="form-group">
                            <label for="security">Security</label>
                            <input type="text" name="security" class="form-control" id="security" value="{{ $wallet->security }}">
                        </div>
                        <div class="form-group">
                            <label for="multi_sig">Multi-sig</label>
                            <input type="text" name="multi_sig" class="form-control" id="multi_sig" value="{{ $wallet->multi_sig }}">
                        </div>
                        <div class="form-group">
                            <label for="buy_crypto">Buy crypto</label>
                            <input type="text" name="buy_crypto" class="form-control" id="buy_crypto" value="{{ $wallet->buy_crypto }}">
                        </div>

                        <div class="form-group">
                            <label for="ease">Ease Of Use</label>
                            <input type="text" name="ease" class="form-control" id="ease" value="{{ $wallet->ease }}">
                        </div>
                        <div class="form-group">
                            <label for="privacy">Privacy</label>
                            <input type="text" name="privacy" class="form-control" id="privacy" value="{{ $wallet->privacy }}">
                        </div>
                        <div class="form-group">
                            <label for="speed">Speed</label>
                            <input type="text" name="speed" class="form-control" id="speed" value="{{ $wallet->speed }}">
                        </div>
                        <div class="form-group">
                            <label for="fee">Fees</label>
                            <input type="text" name="fee" class="form-control" id="fee" value="{{ $wallet->fee }}">
                        </div>
                        <div class="form-group">
                            <label for="reputation">Reputation</label>
                            <input type="text" name="reputation" class="form-control" id="reputation" value="{{ $wallet->reputation }}">
                        </div>
                        <div class="form-group">
                            <label for="Limit">Limits</label>
                            <input type="text" name="limit" class="form-control" id="Limit" value="{{ $wallet->limit}}">
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

            $('#logo-of-wallet').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

        });

    </script>

    
@endsection