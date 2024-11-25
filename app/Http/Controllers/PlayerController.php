<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\Player;
use App\Models\PlayerTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return view('admin.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('admin.players.add', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'preferred_name' => 'nullable|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'year_of_birth' => 'required|date|before:today',
            'email' => 'required|email|max:255|unique:players,email',
            'contact_number' => 'required|numeric|digits_between:10,15',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'registered_with_badminton_england' => 'nullable|boolean',
            'registration_number' => 'nullable|string|max:255|required_if:registered_with_badminton_england,true',
        ], [
            'first_name.required' => 'First Name is required.',
            'surname.required' => 'Surname is required.',
            'year_of_birth.required' => 'Year of Birth is required.',
            'year_of_birth.before' => 'Year of Birth must be a past date.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered.',
            'contact_number.required' => 'Contact Number is required.',
            'contact_number.numeric' => 'Contact Number must be a valid number.',
            'contact_number.digits_between' => 'Contact Number must be between 10 and 15 digits.',
            'picture.image' => 'Profile Picture must be an image.',
            'picture.mimes' => 'Profile Picture must be a file of type: jpeg, png, jpg, gif.',
            'picture.max' => 'Profile Picture size must not exceed 2MB.',
            'registration_number.required_if' => 'Registration Number is required if registered with Badminton England.',
        ]);

        $data = [
            'first_name' => $validatedData['first_name'],
            'surname' => $validatedData['surname'],
            'preferred_name' => $validatedData['preferred_name'] ?? null,
            'year_of_birth' => $validatedData['year_of_birth'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contact_number'],
            'registered_with_badminton_england' => $request->has('registered_with_badminton_england') ? 1 : 0,
            'registration_number' => $request->has('registered_with_badminton_england') ? $validatedData['registration_number'] ?? null : null,
        ];
        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->file('picture')->getClientOriginalExtension();
            $path = $request->file('picture')->storeAs('players', $fileName, 'public');
            $data['picture'] = $path;
        }
        $player = Player::create($data);
        PlayerTeam::create([
            'player_id' => $player->id,
            'team_id' => $validatedData['team_id'],
        ]);
        DB::commit();
        return redirect()->route('players.index')->with('success', 'Player created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = Player::findOrFail($id);
        $player->date_of_birth = Carbon::parse($player->date_of_birth);
        return view('admin.players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        return view('admin.players.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'preferred_name' => 'nullable|string|max:255',
            'year_of_birth' => 'required|date|before:today',
            'email' => 'required|email|max:255|unique:players,email,' . $id,
            'contact_number' => 'required|numeric|digits_between:10,15',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'registered_with_badminton_england' => 'nullable|boolean',
            'registration_number' => 'nullable|string|max:255|required_if:registered_with_badminton_england,true',
        ], [
            'first_name.required' => 'First Name is required.',
            'surname.required' => 'Surname is required.',
            'year_of_birth.required' => 'Year of Birth is required.',
            'year_of_birth.before' => 'Year of Birth must be a past date.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered.',
            'contact_number.required' => 'Contact Number is required.',
            'contact_number.numeric' => 'Contact Number must be a valid number.',
            'contact_number.digits_between' => 'Contact Number must be between 10 and 15 digits.',
            'picture.image' => 'Profile Picture must be an image.',
            'picture.mimes' => 'Profile Picture must be a file of type: jpeg, png, jpg, gif.',
            'picture.max' => 'Profile Picture size must not exceed 2MB.',
            'registration_number.required_if' => 'Registration Number is required if registered with Badminton England.',
        ]);

        $player = Player::findOrFail($id);

        if ($request->hasFile('picture')) {

            // Remove old picture if it exists
            if ($player->picture) {
                $oldImagePath = $player->picture;
                if (\Storage::disk('public')->exists($oldImagePath)) {
                    \Storage::disk('public')->delete($oldImagePath);
                }

            }

            $fileName = time() . '.' . $request->file('picture')->getClientOriginalExtension();
            $path = $request->file('picture')->storeAs('players', $fileName, 'public');

            $validatedData['picture'] = 'players/' . $fileName;
            $player->picture = $validatedData['picture'];
        }
        $player->update([
            'first_name' => $validatedData['first_name'],
            'surname' => $validatedData['surname'],
            'preferred_name' => $validatedData['preferred_name'],
            'year_of_birth' => $validatedData['year_of_birth'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contact_number'],
            'picture' => $validatedData['picture'] ?? $player->picture,
            'registered_with_badminton_england' => $request->has('registered_with_badminton_england') ? 1 : 0,
            'registration_number' => $request->has('registered_with_badminton_england')
                ? ($validatedData['registration_number'] ?? null)
                : null,
        ]);



        return redirect()->route('players.index')->with('success', 'Player updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully!');
    }
}
