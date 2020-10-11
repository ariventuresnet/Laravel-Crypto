@extends('admin.layout')

@section('custom-stylesheet')
<link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection

@section('main-content')
   @include('includes.card_one')

   <!-- activities / quick post -->
   <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-md-10 col-xl-7">
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
                                <h5>Add Card Method</h5>
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
                                <form action="{{route('cardmethods.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label for="name">Name</label>
                                      <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
