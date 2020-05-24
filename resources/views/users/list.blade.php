@extends('layouts.app')

@section('content')

    <top-navigation></top-navigation>
    <left-navigation></left-navigation>

    <div class="container">
        <div class="col-12">
            <div class="col-12">
                <div class="col-6 text-left">
                    Users
                </div>
                <div class="col-6 text-left">
                    User Management > Users
                </div>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created At</th>
                    </tr>
                    </thead>
                    @if( count($users) > 0 )
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <update-user value="{{ $user['name'] }}"
                                                 name="{{ $user['name'] }}"
                                                 email="{{ $user['email'] }}"
                                                 csrf="{{ csrf_token() }}"
                                                 uuid="{{ $user['uuid'] }}"
                                                 admin="{{ $user['role']['admin']  }}"
                                                 roleid="{{  $user['role_uuid'] }}"
                                                 roles="{{ json_encode($roles)  }}"></update-user>
                                </td>
                                <td>{{ $user['email']  }}</td>
                                <td>{{ $user['role']['name']  }}</td>
                                <td>{{ $user['created_at']  }}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr><td colspan="3" class="text-center">No users available</td></tr>
                        @endif
                        </tbody>
                </table>
            </div>
            <add-user csrf="{{ csrf_token() }}" roles="{{ json_encode($roles)  }}"></add-user>
        </div>
    </div>

@endsection
