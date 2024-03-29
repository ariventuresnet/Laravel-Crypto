<section class="container-fluid px-md-5 px-2 py-md-4 py-3">
    <h2 class="mb-4">Wallets</h2>
    <div class="row">
        <div class="col-md-7">
            @foreach ($posts["wallet"] as $post)
                <a href="{{route('wallet.post', $post->slug)}}"><img src="{{asset('images/') . "/" . $post->img}}" class="img-fluid rounded" alt="Responsive image" width="85%"></a>
                <h5 class="font-weight-bold mt-3"> <a href="{{route('wallet.post', $post->slug)}}" class="text-dark"> {{$post->title}} </a> </h5>
                <p>{{ $post->sub_title }}</p>
                <p><i class="far fa-clock text-info"></i> {{$post->created_at->toDateString()}}</p>

                @if ($loop->index == 0)
                    @break
                @endif
            @endforeach
        </div>
        <div class="col-md-5 mt-5">

            @foreach ($posts["wallet"] as $post)
                @if ($loop->index == 0 )
                    @continue
                @endif
                <div class="row mb-3">
                    <div class="col-4 pr-0">
                        <a href="{{route('wallet.post', $post->slug)}}"><img src="{{asset('images/') . "/" . $post->img}}" class="img-fluid rounded" alt="Responsive image" width="100%"></a>
                    </div>
                    <div class="col-8">
                        <a href="{{route('wallet.post', $post->slug)}}" class="font-weight-bold text-dark">{{$post->title}}</a> <br> 
                        <span><i class="far fa-clock text-info"></i> {{$post->created_at->toDateString()}}</span> <br>
                        <span>{{ $post->sub_title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>