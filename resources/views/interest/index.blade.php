@extends('admin.layout')

@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 mb-3">
                Loan List
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
                        <th scope="col">Privacy</th>
                        <th scope="col">Speed</th>
                        <th scope="col">Fees</th>
                        <th scope="col">Limits</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($interests as $interest)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td class="font-weight-bold">{{$interest->name}}</td>
                                <td>{{$interest->privacy}}</td>
                                <td>{{$interest->speed}}</td>
                                <td>{{$interest->fee}}</td>
                                <td>{{$interest->limit}}</td>
                                <td>
                                    <a href="{{route('interests.show', $interest->id)}}" class="text-primary mr-2"><i class="far fa-list-alt"></i></a>
                                    <a href="{{route('interests.edit', $interest->id)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="{{route('loans.delete', $interest->id)}}" id="delete" class="text-danger mr-2" ><i class="fas fa-trash-alt"></i></a> --}}
                                    <a href="#" id="delete" class="text-danger mr-2" ><i class="fas fa-trash-alt"></i></a>
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
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
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