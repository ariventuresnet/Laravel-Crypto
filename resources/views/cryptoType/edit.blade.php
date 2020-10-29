@extends('admin.layout')

@section('custom-stylesheet')
<link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection

@section('main-content')
   @include('includes.card_two')

   <!-- activities / quick post -->
   <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-md-10 col-xl-7">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Crypto Type</h5>
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
                                <form action="{{route('crypto_types.update', $cryptoType->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $cryptoType->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            @if ($cryptoType->status == 1)
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
