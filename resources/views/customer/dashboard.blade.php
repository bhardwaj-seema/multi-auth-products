@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('header-title', 'Dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-400">
                 <h1>Customer Dashboard</h1>

<p>
    Logged in as {{ auth('customer')->user()->name }}
</p>

<p>
    Status: 🟢 Online
</p>



                </div>
            </div>
        </div>
    </div>
@endsection
