<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Team;
use App\Models\Matches;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $matchId)
    {
        $match = Matches::with('team1', 'team2')->findOrFail($matchId);
        return view('admin.results.add', compact('match'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'match_id' => 'required|unique:results,match_id',
            'score_team1' => 'required|integer|min:1',
            'score_team2' => 'required|integer|min:1',
            'is_final' => 'nullable|boolean',
        ], [
            'match_id.required' => 'Match ID is required.',
            'match_id.unique' => 'Match ID already has a result.',
            'score_team1.required' => 'Team 1 score is required.',
            'score_team1.integer' => 'Team 1 score must be a number.',
            'score_team1.min' => 'Team 1 score must be greater than zero.',
            'score_team2.required' => 'Team 2 score is required.',
            'score_team2.integer' => 'Team 2 score must be a number.',
            'score_team2.min' => 'Team 2 score must be greater than zero.',
        ]);


        $validatedData['match_id'] = $request->match_id;
        $validatedData['team1_id'] = $request->team1_id;
        $validatedData['team2_id'] = $request->team2_id;

        $result = Result::create($validatedData);
        return redirect()->route('results.show', $request->match_id)->with('success', 'Result saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $matchId)
    {
        if ($matchId) {
            $result = Result::with('team1', 'team2')->where('match_id', $matchId)->first();

            if ($result) {
                return view('admin.results.index', compact('result'));
            } else {
                $message = "No result available for the given match ID.";
                return view('admin.results.index', compact('message'));
            }
        } else {
            return redirect()->back()->with('error', 'Invalid match ID provided.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $matchId)
    {

        $match = Matches::with('team1', 'team2')->findOrFail($matchId);
        $result = Result::with('team1', 'team2')->where('match_id', $matchId)->first();
        return view('admin.results.edit', compact('match', 'result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'match_id' => 'required|unique:results,match_id,' . $id,
            'score_team1' => 'required|integer|min:1',
            'score_team2' => 'required|integer|min:1',
            'is_final' => 'nullable|boolean',
        ], [
            'match_id.required' => 'Match ID is required.',
            'match_id.unique' => 'Match ID already has a result.',
            'score_team1.required' => 'Team 1 score is required.',
            'score_team1.integer' => 'Team 1 score must be a number.',
            'score_team1.min' => 'Team 1 score must be greater than zero.',
            'score_team2.required' => 'Team 2 score is required.',
            'score_team2.integer' => 'Team 2 score must be a number.',
            'score_team2.min' => 'Team 2 score must be greater than zero.',
        ]);
        $result = Result::findOrFail($id);
        $validatedData['is_final'] = $request->has('is_final') ? 1 : 0;
        $result->update($validatedData);
        return redirect()->route('results.show', $result->match_id)->with('success', 'Result updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Result::where('match_id', $id)->first();
        $result->delete();
        return redirect()->route('matches.index')->with('success', 'Result deleted successfully!');
    }
}
