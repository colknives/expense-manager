@extends('layouts.app')

@section('content')

    <top-navigation></top-navigation>
    <left-navigation></left-navigation>

    <div class="container">
        <div class="col-12">
            <div class="col-12">
                <div class="col-6 text-left">
                    Categories
                </div>
                <div class="col-6 text-left">
                    Expense Management > Categories
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
                    @if( count($categories) > 0 )
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <update-category value="{{ $category['name'] }}"
                                                     name="{{ $category['name'] }}"
                                                     description="{{ $category['description'] }}"
                                                     csrf="{{ csrf_token() }}"
                                                     uuid="{{ $category['uuid'] }}"></update-category>
                                </td>
                                <td>{{ $category['description']  }}</td>
                                <td>{{ $category['created_at']  }}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr><td colspan="3" class="text-center">No categories available</td></tr>
                        @endif
                        </tbody>
                </table>
            </div>
            <add-category csrf="{{ csrf_token() }}"></add-category>
        </div>
    </div>

@endsection
