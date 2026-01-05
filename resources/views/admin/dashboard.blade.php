@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('header-title', 'Dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-400">
                <h3>Admins</h3>
@foreach($admins as $admin)
    <div>{{ $admin->name }} {{ $admin->is_online ? '🟢 Online' : '🔴 Offline' }}</div>
@endforeach

<h3>Customers</h3>
@foreach($customers as $customer)
    <div>{{ $customer->name }} {{ $customer->is_online ? '🟢 Online' : '🔴 Offline' }}</div>
@endforeach


                    {{ __("Admin logged in!") }}
                </div>
            </div>
        </div>
    </div>
@endsection
