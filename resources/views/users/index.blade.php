@extends('layouts.master')
@section('title')
    users
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 container-fluid col-md-offset-1">
            <div class="pull-left btn btn-info">
                Member List
            </div>
            <div class="pull-right">
                <a href="{{route('users.create')}}" class="btn btn-success">Add New Member</a>
            </div>
        </div>
        <div class="col-md-10 container-fluid col-md-offset-1">
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
        <div class="col-md-10 container-fluid col-md-offset-1" style="margin-top: 20px">
            <table class="table table-bordered text-center">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == 1)
                                Admin
                            @else
                                Member
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
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
{!! $users->links() !!}
@endsection
