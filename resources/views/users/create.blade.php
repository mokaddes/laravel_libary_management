@extends('layouts.master')
@section('title')
    Add Member
@endsection
@section('content')
 <div class="container">
     <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="pull-left btn btn-info">
                Add Member
            </div>
            <div class="pull-right">
                <a href="{{route('users.index')}}" class="btn btn-success">Back</a>
            </div>
        </div>
        <div class="col-md-12 col-md-offset-1">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role" class="control-label">Member Role</label>
                    <select name="role" id="rolr" class="form-control">
                        <option value="1">Admin</option>
                        <option value="">Member</option>
                      </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="submit" class="form-control btn btn-info">
                </div>
            </form>
        </div>
     </div>
 </div>
@endsection
