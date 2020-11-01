@extends('admin.layout')

@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 my-3">
                Top Treasury List
            </div>
            
            <div class="px-2">
                <!--Show flash Message -->
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }} font-weight-bold">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <table class="table table-hover">
                    <thead class="">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Market Cap</th>
                        <th scope="col">Algorithm</th>
                        <th scope="col">Dominance</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($cryptos as $crypto)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td class="font-weight-bold">{{$crypto->currency->name}}</td>
                                <td>{{$crypto->cryptoType->name}}</td>
                                <td>{{$crypto->market_cap}}</td>
                                <td>{{$crypto->algorithm}}</td>
                                <td>{{$crypto->dominance}}</td>
                                <td>
                                    <a href="{{route('cryptos.show', $crypto->id)}}" class="text-primary mr-2"><i class="far fa-list-alt"></i></a>
                                    <a href="{{route('cryptos.edit', $crypto->id)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('cryptos.delete', $crypto->id)}}" id="delete" class="text-danger mr-2" ><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <!-- sweet alert cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).on('click', "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    window.location.href = link;
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                
            });
        });
    </script>
@endsection