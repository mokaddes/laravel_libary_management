@extends('layouts.master')
@section('title')
    Rent Book
@endsection

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1 container-fluid">
                <div class="pull-left btn btn-info">
                    Rent Books List
                </div>
                <div class="pull-right">
                    <a href="{{route('rents.create')}}" class="btn btn-success">Rent a Books</a>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 container-fluid">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" style="margin-top: 20px">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('delete'))
                    <div class="alert alert-danger" style="margin-top: 20px">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
            <div class="col-md-10 col-md-offset-1 container-fluid" style="margin-top: 20px">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>No</th>
                        <th>Books Name</th>
                        <th>Member Name</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Return Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($rents as $rent)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{ $rent->book->name }}</td>
                            <td>{{ $rent->user->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($rent->issue_date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($rent->return_date)) }}</td>
                            <td>
                                @if ($rent->is_return == 1)
                                    Returned
                                @else
                                    Not Return
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('rents.destroy', $rent->id) }}" method="post">
                                    {{-- <a href="{{ route('rents.show', $rent->id) }}" class="btn btn-primary">Add Return</a> --}}
                                    <a href="{{ route('rents.edit', $rent->id) }}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
{!! $rents->links() !!}
@endsection
@section('script')

@endsection
