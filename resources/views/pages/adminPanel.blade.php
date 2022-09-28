@extends('layouts.app')
@section('title', 'Admin Panel')
@section('content')
    <div class="col-lg-12 text-center">
        <h2>Admin Dashboard</h2>
    </div>
    <div class="row justify-content-center align-content-center" style="height: 80vh">
        <div class="col-lg-6">
<br><br>
            <a class="btn btn-info" href="/admin/token/10">Generate New Tokens</a><br>
            <br>
            <div style="height: 500px; overflow: auto; border-style: none;">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Token ID</th>
                    <th>Tokens</th>
                    <th>Status</th>
                    <th>Researvation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tokens as $token)
                    <tr>
                        <td>{{$token->token_id}}</td>
                        <td>{{$token->token}}</td>
                        <td style="color: @if (($token->status)=='available') green @elseif (($token->status)=='reserved') orange @elseif (($token->status)=='used') red @endif">
                            {{$token->status}}
                        </td>
                        <td>@if (($token->status)=='available')<a href="/token/status/reserve/{{$token->token_id}}" class="btn btn-warning" disabled><img src="https://img.icons8.com/ios/24/000000/reservation.png"/></a>
                            @elseif (($token->status)=='reserved')<a class="btn btn-warning" disabled><img src="https://img.icons8.com/ios/24/000000/reservation.png"/></a>@endif</td>
                        {{-- <a href="/token/delete/{{$token->token_id}}" class="btn btn-danger"><img src="https://img.icons8.com/material-outlined/24/000000/filled-trash.png" /></a> --}}
                    </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
    <br><br>
@endsection
