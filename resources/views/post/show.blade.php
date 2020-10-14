@extends('admin.layout')

@section('main-content')

   <section>
    <div class="container-fluid pt-5">
        <div class="row mt-3">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-md-10">

                        <div class="d-flex justify-content-end mb-2">
                            <div><a href="{{route('posts.index')}}" class="btn btn-info px-3"> <i class="fas fa-long-arrow-alt-left text-white mr-2"></i>Back</a></div>
                        </div>

                        <!--Show flash Message -->
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }} font-weight-bold">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

                        <h2 class="font-weight-bold">{{$post->title}}</h2>
                        <h5 class="font-weight-bold">Sub-title: {{ $post->sub_title }}</h5>
                        <p class="lead">
                            categoty: <a href="#">{{ ucfirst($post->category->name) }}</a>
                        </p>
                        <p><i class="far fa-clock text-info"></i> {{$post->created_at->toDateString()}}</p>
                        <img src="{{asset('images/') . "/" . $post->img}}" class="img-thumbnail rounded" alt="Responsive image" width="70%">
                        <hr>
                        <p>{!! $post->content !!}</p>

                        <div class="mt-3">
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-style draw-border p-2">Edit <i class="fas fa-arrow-right ml-2"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection