<section class="container-fluid px-md-5 px-2 mb-5">
    <h2>Exchanges</h2>
    <div class="row">
        <div class="col-md-7">
            <div class="mt-5">
                @foreach ($posts as $post)
                    <img src="{{asset('images/') . "/" . $post->img}}" class="img-fluid rounded" alt="Responsive image" width="85%">
                    <h5 class="font-weight-bold mt-3">{{$post->title}}</h5>
                    <p><i class="far fa-clock text-info"></i> {{$post->created_at->toDateString()}}</p>
                    <p>{!! $post->content !!}</p>

                    @if ($loop->index + 1 == 1)
                        @break
                    @endif
                @endforeach
            </div>

        </div>
        <div class="col-md-5 mt-5">

            @foreach ($posts as $post)
                <div class="row mb-3">
                    <div class="col-4 pr-0">
                        <a href="#"><img src="{{asset('images/') . "/" . $post->img}}" class="img-fluid rounded" alt="Responsive image" width="100%"></a>
                    </div>
                    <div class="col-8">
                        <p class="font-weight-bold m-0">{{$post->title}}</p>
                        <p class="m-0"><i class="far fa-clock text-info"></i> {{$post->created_at->toDateString()}}</p>
                        <p class="m-0">{!! substr($post->title, 0, 120) . '...' !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>