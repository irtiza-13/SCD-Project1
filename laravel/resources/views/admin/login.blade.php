@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 100px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; background: #f9fafb; color: black;">
    <h2 style="text-align:center; margin-bottom: 20px; color: black;">Admin Login</h2>

    @if($errors->any())
        <div style="color:red; margin-bottom:10px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div style="margin-bottom:15px;">
            <label style="color:black;">Username</label>
            <input type="text" name="username" class="form-control" required style="color:black;">
        </div>

        <div style="margin-bottom:15px;">
            <label style="color:black;">Password</label>
            <input type="password" name="password" class="form-control" required style="color:black;">
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
