@extends('admin.layout');

@section('main-content')
    <div class="row mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="separator h2 mb-3">
                Top Exchange List
            </div>
            
            <div class="px-2">
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
                        @foreach ($exchanges as $exchange)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td class="font-weight-bold">{{$exchange->Name}}</td>
                                <td>{{$exchange->privacy}}</td>
                                <td>{{$exchange->speed}}</td>
                                <td>{{$exchange->fee}}</td>
                                <td>{{$exchange->limit}}</td>
                                <td>
                                    <a href="{{route('exchanges.show', $exchange->id)}}" class="text-primary mr-2"><i class="far fa-list-alt"></i></a>
                                    <a href="" class="text-success mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="" class="text-danger mr-2" ><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection