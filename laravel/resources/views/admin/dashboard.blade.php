@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .quick-action-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .quick-action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .dashboard-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .card-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="dashboard-container">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <p class="text-gray-600 mt-2">Quick actions and overview</p>
        </div>

        <!-- Quick Actions Section -->
        <div class="mb-10">
            <h2 class="text-xl font-semibold text-gray-700 mb-6">Quick Actions</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Products Management Card -->
                <a href="{{ route('admin.products.index') }}" class="quick-action-card">
                    <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:border-blue-300">
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="card-icon bg-blue-100 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Manage Products</h3>
                                <p class="text-gray-600 text-sm">View, add, edit, or remove products from your inventory</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <span class="text-blue-600 text-sm font-medium">View Products →</span>
                        </div>
                    </div>
                </a>

                <!-- Game Subscriptions Card -->
                <a href="{{ route('game-subscriptions.admin.index') }}" class="quick-action-card">
                    <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:border-green-300">
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="card-icon bg-green-100 text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Game Subscriptions</h3>
                                <p class="text-gray-600 text-sm">Manage gaming subscriptions, plans, and user access</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <span class="text-green-600 text-sm font-medium">Manage Subscriptions →</span>
                        </div>
                    </div>
                </a>

                <!-- Optional: Add more cards here -->
                <div class="bg-gray-50 rounded-xl p-6 border-2 border-dashed border-gray-300 flex flex-col items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <p class="text-gray-500 text-sm">Add more quick actions</p>
                </div>
            </div>
        </div>

        <!-- Stats Overview (Optional) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <div class="bg-white rounded-xl p-6 shadow">
                <h4 class="text-gray-500 text-sm font-medium mb-2">Total Products</h4>
                <p class="text-2xl font-bold text-gray-800">--</p>
                <p class="text-green-500 text-xs mt-1">↗︎ 12% from last month</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow">
                <h4 class="text-gray-500 text-sm font-medium mb-2">Active Subscriptions</h4>
                <p class="text-2xl font-bold text-gray-800">--</p>
                <p class="text-blue-500 text-xs mt-1">↗︎ 8% from last month</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow">
                <h4 class="text-gray-500 text-sm font-medium mb-2">Revenue</h4>
                <p class="text-2xl font-bold text-gray-800">$--</p>
                <p class="text-green-500 text-xs mt-1">↗︎ 15% from last month</p>
            </div>
        </div>
    </div>

    <script>
        // Add click animation
        document.querySelectorAll('.quick-action-card').forEach(card => {
            card.addEventListener('click', function(e) {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    </script>
</body>
</html>


@endsection