@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name.' ' .$user->lname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                @if ($user->role_as == '0')
                                    Guest
                                @endif
                                @if ($user->role_as == '1')
                                    Admin
                                @endif   
                                @if ($user->role_as == '2')
                                    Moderator
                                @endif       
                            </td>
                            <td>
                                <a href="{{ url('admin/view-user/'.$user->id) }}"><button class="btn btn-primary btn-sm">View</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection