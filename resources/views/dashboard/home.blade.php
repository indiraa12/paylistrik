@extends('dashboard/layouts/main')
@section('konten')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>WELCOME BACK,
            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                {{ auth()->user()->name }}
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </h1>
    </div>
    <!-- / Content -->
@endsection
