@extends('layouts.master')
@section('title')
    Edit Book
@endsection
@section('content')
    <div class="controller">
        <div class="row" style="margin:0 auto">
            <div class="col-md-10 c0l-md-offset-1 container-fluid">
                <div class="pull-left btn btn-info">
                    Edit Books
                </div>
                <div class="pull-right">
                    <a href="{{ route('books.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 container-fluid">
                <form action="{{ route('books.update', $book->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="control-label">Book Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $book->name }}">
                    </div>
                    <div class="form-group">
                        <label for="author" class="control-label">Author Name</label>
                        <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="submit" class="btn btn-primary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
