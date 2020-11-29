@extends('admin.layout')

@section('main-content')
    <!-- card -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row pt-md-5 mt-md-3 mb-5">
                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- first card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-money-bill-alt fa-3x text-warning"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Exchanges</h5>
                                            <h3>{{$no_of_exchanges}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Updated Now</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- second card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        {{-- <i class="fas fa-copy"></i> --}}
                                        <i class="fas fa-copy fa-3x text-success"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Posts</h5>
                                            <h3>{{$no_of_posts}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Updated Now</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- third card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-file-upload fa-3x text-info"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Last Post</h5>
                                            <h3>{{$last_post->created_at->format('d-M-y')}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Updated Now</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- forth card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-download fa-3x text-primary"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Last Scrape</h5>
                                            <p></p>
                                            <h5>{{$web_scrape->updated_at->format('d-M g:i A')}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span><a href="{{route('web.scrape')}}" class="p-0 m-0 text-muted btn-scrape">Updated Now</a></span>
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
