@extends('admin.layout')

@section('custom-stylesheet')
<link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection

@section('main-content')
   @include('includes.card')

   <!-- activities / quick post -->
   <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Country</h5>
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
                                <form action="{{route('countries.update', $country->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $country->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="categories">For</label>
                                        <select multiple name="categories[]" class="chosen" id="categories" data-placeholder="Select Categories...">
                                          <option value="exchange" {{ $country->is_exchange == 1 ? 'selected' : '' }}>Exchange</option>
                                          <option value="card" {{ $country->is_card == 1 ? 'selected' : '' }}>Card</option>
                                          <option value="loan" {{ $country->is_loan == 1 ? 'selected' : '' }}>Loan</option>
                                          <option value="interest" {{ $country->is_interest== 1 ? 'selected' : '' }}>Interest</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            @if ($country->status == 1)
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