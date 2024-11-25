<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Event;
use App\Models\TeamEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        return view('admin.teams.add', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // DB::beginTransaction();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:teams,name',
            'event_id' => 'required|exists:events,id',
        ], [
            'name.required' => 'The team name is required.',
            'name.unique' => 'This team name already exists. Please choose another.',
        ]);

        $team = Team::create([
            'name' => $validatedData['name'],
        ]);
        TeamEvent::create([
            'team_id' => $team->id,
            'event_id' => $validatedData['event_id'],
        ]);
        // DB::commit();

        return redirect()->route('teams.index')->with('success', 'Team created successfully!');
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
        $team = Team::findOrFail($id);

        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:teams,name,' . $id,
        ], [
            'name.required' => 'The team name is required.',
            'name.unique' => 'This team name already exists. Please choose another.',
        ]);

        $team = Team::findOrFail($id);
        $team->update([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */


    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }

}
