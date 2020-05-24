@extends('layouts.app')

@section('content')

    <top-navigation></top-navigation>
    <left-navigation></left-navigation>

    <div class="container">
        <div class="col-12">
            <div class="col-12">
                <div class="col-6 text-left">
                    Roles
                </div>
                <div class="col-6 text-left">
                    User Management > Roles
                </div>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created At</th>
                    </tr>
                    </thead>
                    @if( count($roles) > 0 )
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                <update-role value="{{ $role['name'] }}"
                                             name="{{ $role['name'] }}"
                                             description="{{ $role['description'] }}"
                                             csrf="{{ csrf_token() }}"
                                             uuid="{{ $role['uuid'] }}"
                                             admin="{{ $role['admin']  }}"></update-role>
                            </td>
                            <td>{{ $role['description']  }}</td>
                            <td>{{ $role['created_at']  }}</td>
                        </tr>
                    @endforeach
                    @else
                        <tr><td colspan="3" class="text-center">No roles available</td></tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <add-role csrf="{{ csrf_token() }}"></add-role>
        </div>
    </div>

@endsection
