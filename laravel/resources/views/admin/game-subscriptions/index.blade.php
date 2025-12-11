@extends('layouts.app')

@section('title', 'Manage Game Subscriptions')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Game Subscriptions</h1>
        <a href="{{ route('game-subscriptions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle mr-2"></i>Add New Subscription
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Players</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>
                                    <img src="{{ $subscription->image_url ?: 'https://via.placeholder.com/100x60/374151/FFFFFF?text=Game' }}" 
                                         alt="{{ $subscription->name }}" 
                                         class="img-thumbnail" 
                                         style="width: 100px; height: 60px; object-fit: cover;">
                                </td>
                                <td>{{ $subscription->name }}</td>
                                <td>
                                    <span class="badge bg-info text-white">{{ $subscription->category }}</span>
                                </td>
                                <td>${{ number_format($subscription->price, 2) }}</td>
                                <td>{{ $subscription->duration_days }} days</td>
                                <td>{{ $subscription->max_players ?: 'Unlimited' }}</td>
                                <td>
                                    <span class="badge {{ $subscription->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $subscription->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $subscription->is_featured ? 'bg-warning' : 'bg-secondary' }}">
                                        {{ $subscription->is_featured ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('game-subscriptions.edit', $subscription) }}" 
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('game-subscriptions.destroy', $subscription) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this subscription?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection