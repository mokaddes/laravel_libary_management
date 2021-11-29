@extends('layouts.master')
@section('title')
    Edit Member
@endsection
@section('content')
 <div class="container">
     <div class="row">
        <div class="col-md-10 col-md-offset-1 container-fluid">
            <div class="pull-left btn btn-info">
                Edit Member
            </div>
            <div class="pull-right">
                <a href="{{route('users.index')}}" class="btn btn-success">Back</a>
            </div>
        </div>
        <div class="col-md-10 container-fluid col-md-offset-1" style="margin-top: 20px">
            <form action="{{ route('users.update', $users->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $users->name }}">
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $users->email }}">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                @if ($users->id != Auth::user()->id)
                    <div class="form-group">
                        <label for="role" class="control-label">Member Role</label>
                        <select name="role" id="rolr" class="form-control">
                            <option value="1">Admin</option>
                            <option value="">Member</option>
                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <input type="submit" value="submit" class="form-control btn btn-info">
                </div>
            </form>
        </div>
     </div>
 </div>
@endsection
