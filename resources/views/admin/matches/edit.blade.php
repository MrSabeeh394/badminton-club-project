@extends('admin.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Matches</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Matches</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Match</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Match</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <!-- Display error messages -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('matches.update', $match->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Event -->
                                                <div class="form-group">
                                                    <label for="event_id">Event</label>
                                                    <select class="form-control @error('event_id') is-invalid @enderror"
                                                        id="event_id" name="event_id">
                                                        <option value="">Select Event</option>

                                                        <option selected value="{{ $match->event_id }}">
                                                            {{ $match->event->title }}
                                                        </option>
                                                        @foreach ($events->where('id', '!=', $match->event_id) as $event)
                                                                <option value="{{ $event->id }}"
                                                                    {{ old('event_id') == $event->id ? 'selected' : '' }}>
                                                                    {{ $event->title }}
                                                                </option>
                                                        @endforeach
                                                    </select>
                                                    @error('event_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Team 1 -->
                                                        <div class="form-group">
                                                            <label for="team1_id">Team 1</label>
                                                            <select
                                                                class="form-control @error('team1_id') is-invalid @enderror"
                                                                id="team1_id" name="team1_id">
                                                                <option value="">Select Event</option>
                                                                <option selected value="{{ $match->team1_id }}">
                                                                    {{ $match->team1->name }}
                                                                </option>
                                                                @foreach ($teams->where('id', '!=', $match->team1_id) as $team)
                                                                    <option value="{{ $team->id }}"
                                                                        {{ old('team1_id') == $team->id ? 'selected' : '' }}>
                                                                        {{ $team->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('team1_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Team 2 -->
                                                        <div class="form-group">
                                                            <label for="team2_id">Team 2</label>
                                                            <select
                                                                class="form-control @error('team2_id') is-invalid @enderror"
                                                                id="team2_id" name="team2_id">
                                                                <option value="">Select Team 2</option>
                                                                <option selected value="{{ $match->team2_id }}">
                                                                    {{ $match->team2->name }}
                                                                </option>
                                                                @foreach ($teams->where('id', '!=', $match->team2_id) as $team)
                                                                    <option value="{{ $team->id }}"
                                                                        {{ old('team2_id') == $team->id ? 'selected' : '' }}>
                                                                        {{ $team->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('team2_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Type -->
                                                <div class="form-group">
                                                    <label for="type">Match Type</label>
                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        id="type" name="type">
                                                        <option value="Group"
                                                            {{ old('type', $match->type) == 'Group' ? 'selected' : '' }}>Group</option>
                                                        <option value="Knockout"
                                                            {{ old('type', $match->type) == 'Knockout' ? 'selected' : '' }}>Knockout
                                                        </option>
                                                    </select>
                                                    @error('type')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Points -->
                                                <div class="form-group">
                                                    <label for="points">Points</label>
                                                    <select class="form-control @error('points') is-invalid @enderror"
                                                        id="points" name="points">
                                                        <option value="21" {{ old('points', $match->points) == 21 ? 'selected' : '' }}>
                                                            21</option>
                                                        <option value="30" {{ old('points', $match->points) == 30 ? 'selected' : '' }}>
                                                            30</option>
                                                    </select>
                                                    @error('points')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Sets -->
                                                <div class="form-group">
                                                    <label for="sets">Sets</label>
                                                    <select class="form-control @error('sets') is-invalid @enderror"
                                                        id="sets" name="sets">
                                                        <option value="Single"
                                                            {{ old('sets', $match->sets) == 'Single' ? 'selected' : '' }}>Single</option>
                                                        <option value="Best of 3"
                                                            {{ old('sets', $match->sets) == 'Best of 3' ? 'selected' : '' }}>Best of 3
                                                        </option>
                                                    </select>
                                                    @error('sets')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Setting -->
                                                <div class="form-group">
                                                    <label for="setting">Setting</label>
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input @error('setting') is-invalid @enderror"
                                                            id="setting" name="setting" value="1"
                                                            {{ old('setting', $match->setting) ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="setting">Yes</label>
                                                    </div>
                                                    @error('setting')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit and Cancel Buttons -->
                                        <div class="card-action">
                                            <button class="btn btn-success" type="submit">Update</button>
                                            <a href="{{ route('players.index') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript to toggle Registration Number -->
    <script>
        document.getElementById('registered_with_badminton_england').addEventListener('change', function() {
            const container = document.getElementById('registration_number_container');
            container.style.display = this.checked ? 'block' : 'none';
        });
    </script>
@endsection


