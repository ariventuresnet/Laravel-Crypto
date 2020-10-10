@extends('admin.layout')

@section('main-content')
   @include('includes.card_one')

   <!-- activities / quick post -->
   <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col">
                            <h3 class="text-muted text-center mb-3">Country</h3>

                            <!--Show flash Message -->
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }} font-weight-bold">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>
                            <!-- first table -->
                            <table class="table table-striped bg-light text-center">
                                <thead>
                                    <tr class="text-muted">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Exchange</th>
                                        <th>Card</th>
                                        <th>Loan</th>
                                        <th>Wallet</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($countries as $country)
                                    <tr>
                                        <th>{{$loop->index + 1}}</th>
                                        <td>{{  $country->name}}</td>
                                        <td>{!! $country->is_exchange == 0 ? 'false' : '<p class="text-success font-weight-bold">true</p>' !!}</td>
                                        <td>{!! $country->is_card == 0 ? 'false' : '<p class="text-success font-weight-bold">true</p>' !!}</td>
                                        <td>{!! $country->is_loan == 0 ? 'false' : '<p class="text-success font-weight-bold">true</p>' !!}</td>
                                        <td>{!! $country->is_interest== 0 ? 'false' : '<p class="text-success font-weight-bold">true</p>' !!}</td>
                                        <td>{!! $country->status== 0 ? '<p class="text-warning font-weight-bold">Inactive</p>' : '<p class="text-success font-weight-bold">Active</p>' !!}</td>
                                        <td>
                                            <a href="{{route('countries.edit', $country->id)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('countries.delete', $country->id)}}" id="delete" class="text-danger" ><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
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