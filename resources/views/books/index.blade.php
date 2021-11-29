@extends('layouts.master')
@section('title')
    New Books
@endsection

@section('content')
<section class="content">
    <div class="container">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1 container-fluid">
                <div class="pull-left btn btn-info">
                    Books List
                </div>
                <div class="pull-right">
                    <a href="{{route('books.create')}}" class="btn btn-success">Add New Books</a>
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
                        <th>Author Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
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
</section>
{!! $books->links() !!}
@endsection
@section('script')

@endsection
