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
                    <a href=" {{ route('book_return') }} " class="btn btn-success">Back</a>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 container-fluid" style="margin-top: 20px">
                <form action=" {{ route('is_return', $rent->id) }} " method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <span class="form-control">
                            <strong>Member Name: </strong> {{ $rent->user->name }}
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="form-control">
                            <strong>Book Name: </strong> {{ $rent->book->name }}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="is_return" class="control-label">Return Status</label>
                        <select name="is_return" id="is_return" class="form-control">
                            <option value="">Select Return Status</option>
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
