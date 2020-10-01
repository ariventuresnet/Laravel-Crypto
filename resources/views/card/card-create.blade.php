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
                        Add Card
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

                    <form action="{{route('cards.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Card Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="card-logo">
                              <label class="custom-file-label" for="card-logo">Choose Logo</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="url">Card URL</label>
                            <input type="text" name="url" class="form-control" id="url" value="{{old('url')}}">
                        </div>

                        <div class="form-group">
                            <label for="multiple-currencies">Currencies</label>
                            <select multiple class="chosen" name="currencies[]" data-placeholder="Select Currencies...">
                                <option value="bitcoin">Bitcoin</option>
                                <option value="ethereum">Ethereum</option>
                                <option value="tether">Tether</option>
                                <option value="litecoin">Litecoin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple-countries">Countries</label>
                            <select multiple name="countries[]" class="chosen" data-placeholder="Select Countries...">
                              <option value="china">China</option>
                              <option value="india">India</option>
                              <option value="usa">USA</option>
                              <option value="indonesia">Indonesia</option>
                              <option value="brazil">Brazil</option>
                              <option value="nigeria">Nigeria</option>
                              <option value="russia">Russia</option>
                              <option value="japan">Japan</option>
                              <option value="bangladesh">Bangladesh</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="multiple-payment">Payment Method</label>
                            <select multiple name="payments[]" class="chosen" data-placeholder="Select Payment method...">
                                <option value="visa">Visa</option>
                                <option value="mastercard">Mastercard</option>
                                <option value="credit card">Credit card</option>
                                <option value="union pay">Union pay</option>
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

                        <!-- New Column -->
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" id="price" value="{{old('price')}}">
                        </div>
                        <div class="form-group">
                            <label for="delivery_fees">Delivery Fees</label>
                            <input type="text" name="delivery_fees" class="form-control" id="delivery_fees" value="{{old('delivery_fees')}}">
                        </div>
                        <div class="form-group">
                            <label for="coverage">Coverage</label>
                            <input type="text" name="coverage" class="form-control" id="coverage" value="{{old('coverage')}}">
                        </div>
                        <div class="form-group">
                            <label for="monthly_fees">Monthly Fees</label>
                            <input type="text" name="monthly_fees" class="form-control" id="monthly_fees" value="{{old('monthly_fees')}}">
                        </div>
                        <div class="form-group">
                            <label for="atm_fees">Atm Fees</label>
                            <input type="text" name="atm_fees" class="form-control" id="atm_fees" value="{{old('atm_fees')}}">
                        </div>
                        <div class="form-group">
                            <label for="monthly_atm_limit">Monthly Atm Limit</label>
                            <input type="text" name="monthly_atm_limit" class="form-control" id="monthly_atm_limit" value="{{old('monthly_atm_limit')}}">
                        </div>
                        <div class="form-group">
                            <label for="online_purchases">Online Purchases</label>
                            <input type="text" name="online_purchases" class="form-control" id="online_purchases" value="{{old('online_purchases')}}">
                        </div>
                        <div class="form-group">
                            <label for="monthly_purchases">Monthly Purchases</label>
                            <input type="text" name="monthly_purchases" class="form-control" id="monthly_purchases" value="{{old('monthly_purchases')}}">
                        </div>
                        <!-- End Of New Column -->

                        <div class="text-center">
                            <button type="submit" class="btn btn-style draw-border mb-3">Add Card</button>
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


            $('#card-logo').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });


        });

    </script>

    
@endsection