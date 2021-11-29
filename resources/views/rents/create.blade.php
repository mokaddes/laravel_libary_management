@extends('layouts.master')
@section('title')
    Rent a Book
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 container-fluid">
                <div class="pull-left btn btn-info">
                    Rent a Book
                </div>
                <div class="pull-right">
                    <a href=" {{ route('rents.index') }} " class="btn btn-success">Back</a>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 container-fluid" style="margin-top: 20px">
                <form action=" {{ route('rents.store') }} " method="post">
                    @csrf

                    <div class="form-group">
                        <label for="user_id" class="control-label">Member</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Select Mamber</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book_id" class="control-label">Books</label>
                        <select name="book_id" id="book_id" class="form-control">
                            <option value="">Select Book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="issue_date" class="control-label">Select Issue date</label>
                            <input type="date" name="issue_date" id="issue_date" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="return_date" class="control-label">Select Return date</label>
                            <input type="date" name="return_date" id="return_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="submit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
