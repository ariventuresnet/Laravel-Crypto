@extends('admin.layout')

@section('main-content')
    <!-- card -->
 <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row pt-md-5 mt-md-3 mb-5">
                    
                    <div class="col-lg-3 col-sm-6 p-2">
                        <!-- first card -->
                        <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-gem fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Treasuries</h5>
                                        <h3>{{$num_of_treasury}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('treasuries.create')}}"><i class="far fa-plus-square fa-2x text-primary mr-2"></i></a>
                                <a href="{{route('treasuries.index')}}"><i class="far fa-list-alt fa-2x text-success"></i></a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- end of card -->
@endsection