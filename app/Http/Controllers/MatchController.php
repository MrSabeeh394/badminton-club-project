<?php

namespace App\Http\Controllers;


use App\Models\Matches;
use App\Models\Team;
use App\Models\Event;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = Matches::with(['event', 'team1', 'team2'])->get();

        return view('admin.matches.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        $teams = Team::all();
        return view('admin.matches.add', compact('events', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id|different:team1_id',
            'type' => 'required|in:Group,Knockout',
            'points' => 'required|in:21,30',
            'sets' => 'required|in:Single,Best of 3',
            'setting' => 'sometimes|boolean',
        ], [
            'team2_id.different' => 'Team 2 must be different from Team 1.',
        ]);

        $match = Matches::create($validated);

        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $match = Matches::with(['event', 'team1', 'team2'])->find($id);
        $events = Event::all();
        $teams = Team::all();
        return view('admin.matches.edit', compact('match', 'events', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id|different:team1_id',
            'type' => 'required|in:Group,Knockout',
            'points' => 'required|in:21,30',
            'sets' => 'required|in:Single,Best of 3',
            'setting' => 'sometimes|boolean',
        ], [
            'team2_id.different' => 'Team 2 must be different from Team 1.',
        ]);
        $match = Matches::findOrFail($id);
        $match->update([
            'event_id' => $validated['event_id'],
            'team1_id' => $validated['team1_id'],
            'team2_id' => $validated['team2_id'],
            'type' => $validated['type'],
            'points' => $validated['points'],
            'sets' => $validated['sets'],
            'setting' => $validated['setting'],
        ]);
        return redirect()->route('matches.index')->with('success', 'Match updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $match = Matches::findOrFail($id);
        $match->delete();

        return redirect()->route('matches.index')->with('success', 'Match deleted successfully!');
    }
}
