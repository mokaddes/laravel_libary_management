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
                <form action=" {{ route('rents.update', $rent->id) }} " method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="user_id" class="control-label">Member</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value=" {{ $rent->user_id }} ">{{ $rent->user->name }}</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book_id" class="control-label">Books</label>
                        <select name="book_id" id="book_id" class="form-control">
                            <option value=" {{ $rent->book_id }} ">{{ $rent->book->name }}</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="issue_date" class="control-label">Select Issue date</label>
                            <input type="date" name="issue_date" id="issue_date" class="form-control" value=" {{ $rent->issue_date }} ">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="return_date" class="control-label">Select Issue date</label>
                            <input type="date" name="return_date" id="return_date" class="form-control" value=" {{ $rent->return_date }} ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="is_return" class="control-label">Return Status</label>
                        <select name="is_return" id="is_return" class="form-control">
                            <option value="{{$rent->is_return}}">
                                @if ($rent->is_return == 1)
                                    Returned
                                @else
                                     Not Return
                                @endif
                            </option>
                            <option value="1">Returned</option>
                            <option value="">Not Return</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="submit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
