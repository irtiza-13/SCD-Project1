<?php

namespace App\Http\Controllers;

use App\Models\GameSubscription;
use Illuminate\Http\Request;

class GameSubscriptionController extends Controller
{
    // Frontend Display
    public function index()
    {
        $subscriptions = GameSubscription::where('is_active', true)->get();
        return view('game-subscriptions', compact('subscriptions'));
    }

    // Admin Panel - List all subscriptions
    public function adminIndex()
    {
        $subscriptions = GameSubscription::all();
        return view('admin.game-subscriptions.index', compact('subscriptions'));
    }

    // Show create form
    public function create()
    {
        return view('admin.game-subscriptions.create');
    }

    // Store new subscription
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'max_players' => 'nullable|integer|min:1',
            'image_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        GameSubscription::create($validated);

        return redirect()->route('admin.game-subscriptions.index')
            ->with('success', 'Game subscription created successfully!');
    }

    // Show edit form
    public function edit(GameSubscription $gameSubscription)
    {
        return view('admin.game-subscriptions.edit', compact('gameSubscription'));
    }

    // Update subscription
    public function update(Request $request, GameSubscription $gameSubscription)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'max_players' => 'nullable|integer|min:1',
            'image_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $gameSubscription->update($validated);

        return redirect()->route('admin.game-subscriptions.index')
            ->with('success', 'Game subscription updated successfully!');
    }

    // Delete subscription
    public function destroy(GameSubscription $gameSubscription)
    {
        $gameSubscription->delete();
        
        return redirect()->route('game-subscriptions.admin.index')
            ->with('success', 'Game subscription deleted successfully!');
    }


public function apiAll()
{
    return response()->json(GameSubscription::all(), 200);
}

public function apiShow($id)
{
    return response()->json(GameSubscription::findOrFail($id), 200);
}

public function apiStore(Request $request)
{
    $subscription = GameSubscription::create($request->all());
    return response()->json($subscription, 201);
}

public function apiUpdate(Request $request, $id)
{
    $subscription = GameSubscription::findOrFail($id);
    $subscription->update($request->all());

    return response()->json($subscription, 200);
}

public function apiDelete($id)
{
    GameSubscription::destroy($id);
    return response()->json(['message' => 'Subscription deleted'], 200);
}

}