@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-12">

            <div class="col-6">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Expense Category</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( count($expenses) > 0 )
                            @foreach( $expenses as $expense )
                                <tr>
                                    <td>{{ $expense['name'] }}</td>
                                    <td>{{ number_format($expense['expense_amount'], 2, '.', ',') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2">No expenses found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection
