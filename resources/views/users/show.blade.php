@extends('layouts.master')
@section('title')
    Show Book
@endsection
@section('content')
    <div class="controller">
        <div class="row" style="margin:0 auto">
            <div class="col-md-10 c0l-md-offset-1 container-fluid">
                <div class="pull-left btn btn-info">
                    Show Users
                </div>
                <div class="pull-right">
                    <a href="{{ route('users.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 container-fluid" style="margin-top: 20px">
                <h1 class="header">
                    <strong>Member Name:</strong> {{ $users->name }}
                </h1>
                <h3>
                    <strong>Member Email:</strong> {{ $users->email }}
                </h3>
                <h3>
                    <strong>Member Status:</strong>
                    @if ($users->role == 1)
                        Admin
                    @else
                        Member
                    @endif
                </h3>
            </div>
        </div>
    </div>
@endsection
