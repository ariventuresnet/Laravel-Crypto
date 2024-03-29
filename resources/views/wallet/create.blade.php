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
                        Add Wallet
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

                    <form action="{{route('wallets.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="logo-of-wallet">
                              <label class="custom-file-label" for="loan-logo">Choose Logo</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" id="url" value="{{old('url')}}">
                        </div>

                        <div class="form-group">
                            <label for="multiple-currencies">Currencies</label>
                            <select multiple class="chosen" name="currencies[]" data-placeholder="Select Currencies...">
                                @foreach ($currencies as $currency)
                                    <option value="{{strtolower($currency->name)}}">{{ strtoupper($currency->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple-types">Types</label>
                            <select multiple name="type[]" class="chosen" data-placeholder="Select Types...">
                                @foreach ($walletTypes as $walletType)
                                    <option value="{{strtolower($walletType->name)}}">{{ strtoupper($walletType->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="3">{!! old('description') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pros">Pros</label>
                            <textarea name="pros" id="pros" class="form-control" cols="30" rows="3">{!! old('pros') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cons">Cons</label>
                            <textarea name="cons" id="cons" class="form-control" cols="30" rows="3">{!! old('cons') !!}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="btc-only">BTC Only</label>
                            <input type="text" name="btc_only" class="form-control" id="btc-only" value="{{old('btc_only')}}">
                        </div>
                        <div class="form-group">
                            <label for="lightning">Lightning</label>
                            <input type="text" name="lightning" class="form-control" id="lightning" value="{{old('lightning')}}">
                        </div>
                        <div class="form-group">
                            <label for="liquid">Liquid</label>
                            <input type="text" name="liquid" class="form-control" id="liquid" value="{{old('liquid')}}">
                        </div>
                        <div class="form-group">
                            <label for="security">Security</label>
                            <input type="text" name="security" class="form-control" id="security" value="{{old('security')}}">
                        </div>
                        <div class="form-group">
                            <label for="multi-sig">Multi-sig</label>
                            <input type="text" name="multi_sig" class="form-control" id="multi-sig" value="{{old('multi_sig')}}">
                        </div>
                        <div class="form-group">
                            <label for="buy-crypto">Buy Crypto</label>
                            <input type="text" name="buy_crypto" class="form-control" id="buy-crypto" value="{{old('buy_crypto')}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="ease">Ease Of Use</label>
                            <input type="text" name="ease" class="form-control" id="ease" value="{{old('ease')}}">
                        </div>
                        <div class="form-group">
                            <label for="privacy">Privacy</label>
                            <input type="text" name="privacy" class="form-control" id="privacy" value="{{old('privacy')}}">
                        </div>
                        <div class="form-group">
                            <label for="speed">Speed</label>
                            <input type="text" name="speed" class="form-control" id="speed" value="{{old('speed')}}">
                        </div>
                        <div class="form-group">
                            <label for="fee">Fees</label>
                            <input type="text" name="fee" class="form-control" id="fee" value="{{old('fee')}}">
                        </div>
                        <div class="form-group">
                            <label for="reputation">Reputation</label>
                            <input type="text" name="reputation" class="form-control" id="reputation" value="{{old('reputation')}}">
                        </div>
                        <div class="form-group">
                            <label for="Limit">Limits</label>
                            <input type="text" name="limit" class="form-control" id="Limit" value="{{old('limit')}}">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-style draw-border mb-3">Add Wallet</button>
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
        // $("#description").focus(function(){});
        
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

            $('#logo-of-wallet').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

        });

    </script>

    
@endsection