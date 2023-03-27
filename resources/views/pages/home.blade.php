@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Avatar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row"> {{ $user->id }} </th>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> <img width="300px" src="{{ $user->avatar }}" /> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
