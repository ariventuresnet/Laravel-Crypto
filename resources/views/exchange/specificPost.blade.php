@extends('layouts.cryptocutter-layout')

@section('custom-css')
    <style>
        header {
            height     : 23vh;
            background :  #fff;
        }
        .post-img{
            width : 100vw;
            height: 480px; 
        }
    </style>
@endsection

@section('main-content')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <img src="{{asset('images/') . "/" . $specificPost->img}}" class="img-fluid rounded post-img" alt="Responsive image">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h2 class="font-weight-bold"> {{ $specificPost->title}} </h2>
                <p class="lead">{{ $specificPost->sub_title}}</p>
                <p class="mb-4"><i class="far fa-clock text-info"></i> {{ $specificPost->created_at->toDateString() }}</p>

                <p>{!! $specificPost->content !!}</p>
                
            </div>
        </div>
        <hr>
        <h2 class="mt-4">Exchanges</h2>
        <div class="row my-4">
            <div class="col-md-6">
                @for ($i = 0 ; $i < 3; $i++)
                    @if ($i >= count($posts))
                        @break
                    @endif
                    
                    <?php $post = $posts[$i]; ?>
                    <div class="row mb-2">
                        <div class="col-4 pr-0">
                            <a href="{{route('exchange.post', $post->slug)}}"> <img src="{{asset('images/') . "/" . $post->img}}" class="img-fluid rounded" alt="Responsive image" width="100%"> </a>
                        </div>
                        <div class="col-8">
                            <a href="{{route('exchange.post', $post->slug)}}" class="font-weight-bold text-dark">{{$post->title}}</a> <br>
                            <span><i class="far fa-clock text-info"></i> {{$post->created_at->toDateString()}}</span> <br>
                            <span>{{ $post->sub_title }}</span>
                        </div>
                    </div>

                @endfor
                
            </div>



            <div class="col-md-6">
                @for ($i = 3 ; $i < 6; $i++)
                    @if ($i >= count($posts))
                        @break
                    @endif
                    
                    <?php $post = $posts[$i]; ?>
                    <div class="row mb-2">
                        <div class="col-4 pr-0">
                            <a href="{{route('exchange.post', $post->slug)}}"> <img src="{{asset('images/') . "/" . $post->img}}" class="img-fluid rounded" alt="Responsive image" width="100%"> </a>
                        </div>
                        <div class="col-8">
                            <a href="{{route('exchange.post', $post->slug)}}" class="font-weight-bold text-dark">{{$post->title}}</a> <br>
                            <span><i class="far fa-clock text-info"></i> {{$post->created_at->toDateString()}}</span> <br>
                            <span>{{ $post->sub_title }}</span>
                        </div>
                    </div>

                @endfor
                
            </div>
        </div>
        <hr>
    </div>
@endsection