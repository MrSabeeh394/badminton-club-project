<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'team_type' => 'required|in:Singles,Doubles',
            'max_teams' => 'required|integer|min:1|max:64',
            'event_type' => 'required|in:Tournament,League,Friendly,Other',
            'shuttle_type' => 'required|in:feather,nylon',
            'date' => 'required|date|after:today',
            'event_detail' => 'required|in:Doubles League (Feather),Doubles League (Nylon),Singles League (Feather),Doubles Tournament (Cat C),Doubles Tournament (Cat D),Doubles Tournament (Open),Singles Tournament (Cat C),Singles Tournament (Cat D),Singles Tournament (Open),Mini Tournament (Doubles),Mini Tournament (Singles),Friendly (Singles),Friendly (Doubles),Other',
            'location' => 'required|string|max:255',
            'complete_results' => 'nullable|boolean',
        ], [
            'title.required' => 'Title is required.',
            'level.required' => 'Level is required.',
            'level.in' => 'Selected Level is invalid.',
            'team_type.required' => 'Team Type is required.',
            'team_type.in' => 'Selected Team Type is invalid.',
            'max_teams.required' => 'Max Teams is required.',
            'max_teams.integer' => 'Max Teams must be an integer.',
            'max_teams.min' => 'Max Teams must be at least 1.',
            'event_type.required' => 'Event Type is required.',
            'event_type.in' => 'Selected Event Type is invalid.',
            'shuttle_type.required' => 'Shuttle Type is required.',
            'shuttle_type.in' => 'Selected Shuttle Type is invalid.',
            'date.required' => 'Date is required.',
            'date.date' => 'Date must be a valid date.',
            'date.after' => 'Date must be a future date.',
            'event_detail.required' => 'Event Detail is required.',
            'event_detail.in' => 'Selected Event Detail is invalid.',
            'location.required' => 'Location is required.',
            'location.max' => 'Location must not exceed 255 characters.',
            'complete_results.boolean' => 'Complete Results must be true or false.',
        ]);

        $event = new Event();
        $event->title = $validatedData['title'];
        $event->level = $validatedData['level'];
        $event->team_type = $validatedData['team_type'];
        $event->max_teams = $validatedData['max_teams'];
        $event->event_type = $validatedData['event_type'];
        $event->shuttle_type = $validatedData['shuttle_type'];
        $event->date = $validatedData['date'];
        $event->event_detail = $validatedData['event_detail'];
        $event->location = $validatedData['location'];
        $event->complete_results = $validatedData['complete_results'] ?? false;

        $event->save();

        return redirect()->route('events.index')->with('success', 'Event created successfully');

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
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'team_type' => 'required|in:Singles,Doubles',
            'max_teams' => 'required|integer|min:1|max:64',
            'event_type' => 'required|in:Tournament,League,Friendly,Other',
            'shuttle_type' => 'required|in:feather,nylon',
            'date' => 'required|date|after:today',
            'event_detail' => 'required|in:Doubles League (Feather),Doubles League (Nylon),Singles League (Feather),Doubles Tournament (Cat C),Doubles Tournament (Cat D),Doubles Tournament (Open),Singles Tournament (Cat C),Singles Tournament (Cat D),Singles Tournament (Open),Mini Tournament (Doubles),Mini Tournament (Singles),Friendly (Singles),Friendly (Doubles),Other',
            'location' => 'required|string|max:255',
            'complete_results' => 'nullable|boolean',
        ], [
            'title.required' => 'Title is required.',
            'level.required' => 'Level is required.',
            'level.in' => 'Selected Level is invalid.',
            'team_type.required' => 'Team Type is required.',
            'team_type.in' => 'Selected Team Type is invalid.',
            'max_teams.required' => 'Max Teams is required.',
            'max_teams.integer' => 'Max Teams must be an integer.',
            'max_teams.min' => 'Max Teams must be at least 1.',
            'event_type.required' => 'Event Type is required.',
            'event_type.in' => 'Selected Event Type is invalid.',
            'shuttle_type.required' => 'Shuttle Type is required.',
            'shuttle_type.in' => 'Selected Shuttle Type is invalid.',
            'date.required' => 'Date is required.',
            'date.date' => 'Date must be a valid date.',
            'date.after' => 'Date must be a future date.',
            'event_detail.required' => 'Event Detail is required.',
            'event_detail.in' => 'Selected Event Detail is invalid.',
            'location.required' => 'Location is required.',
            'location.max' => 'Location must not exceed 255 characters.',
            'complete_results.boolean' => 'Complete Results must be true or false.',
        ]);

        $event = Event::findOrFail($id);
        $completeResults = $validatedData['complete_results'] ?? false;

        $event->update([
            'title' => $validatedData['title'],
            'level' => $validatedData['level'],
            'team_type' => $validatedData['team_type'],
            'max_teams' => $validatedData['max_teams'],
            'event_type' => $validatedData['event_type'],
            'shuttle_type' => $validatedData['shuttle_type'],
            'date' => $validatedData['date'],
            'event_detail' => $validatedData['event_detail'],
            'location' => $validatedData['location'],
            'complete_results' => $completeResults,
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
