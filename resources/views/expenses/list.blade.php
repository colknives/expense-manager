@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="col-12 mb-5">
                <div class="col-6 text-left">
                    <h2>Expenses</h2>
                </div>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Expense Category</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Entry Date</th>
                        <th scope="col">Created At</th>
                    </tr>
                    </thead>
                    @if( count($expenses) > 0 )
                        <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>
                                    <update-expense value="{{ $expense['category']['name'] }}"
                                                    category_uuid="{{ $expense['category_uuid'] }}"
                                                    amount="{{ $expense['amount'] }}"
                                                    entry_date="{{ $expense['entry_date']}}"
                                                    csrf="{{ csrf_token() }}"
                                                    uuid="{{ $expense['uuid'] }}"
                                                    categories="{{ json_encode($categories)  }}"></update-expense>
                                </td>
                                <td>{{ $expense['amount']  }}</td>
                                <td>{{ $expense['entry_date']  }}</td>
                                <td>{{ $expense['created_at']  }}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr><td colspan="3" class="text-center">No expenses available</td></tr>
                        @endif
                        </tbody>
                </table>
            </div>
            <add-expense csrf="{{ csrf_token() }}" categories="{{ json_encode($categories)  }}"></add-expense>
        </div>
    </div>

@endsection
