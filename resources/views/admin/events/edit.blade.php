@extends('admin.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Events</h3>
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
                        <a href="#">Events</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Event </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Event</div>
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
                                    <form action="{{ route('events.update', $event->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!-- Title and Level -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        id="title" name="title" placeholder="Enter Title"
                                                        value="{{ $event->title ?? old('title') }}">
                                                    @error('title')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="level">Level</label>
                                                    <select class="form-control @error('level') is-invalid @enderror"
                                                        id="level" name="level">
                                                        <option value="">Select Level</option>
                                                        <option value="Beginner"
                                                            {{ old('level', $event->level ?? '') == 'Beginner' ? 'selected' : '' }}>
                                                            Beginner</option>
                                                        <option value="Intermediate"
                                                            {{ old('level', $event->level ?? '') == 'Intermediate' ? 'selected' : '' }}>
                                                            Intermediate
                                                        </option>
                                                        <option value="Advanced"
                                                            {{ old('level', $event->level ?? '') == 'Advanced' ? 'selected' : '' }}>
                                                            Advanced</option>
                                                    </select>
                                                    @error('level')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Team Type and Max Team -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="team_type">Team Type</label>
                                                    <select class="form-control @error('team_type') is-invalid @enderror"
                                                        id="team_type" name="team_type">
                                                        <option value="">Select Team Type</option>
                                                        <option value="Singles"
                                                            {{ old('team_type', $event->team_type ?? '') == 'Singles' ? 'selected' : '' }}>
                                                            Singles
                                                        </option>
                                                        <option value="Doubles"
                                                            {{ old('team_type', $event->team_type ?? '') == 'Doubles' ? 'selected' : '' }}>
                                                            Doubles
                                                        </option>
                                                    </select>
                                                    @error('team_type')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Max Teams -->
                                                <div class="form-group">
                                                    <label for="max_teams">Max Teams</label>
                                                    <input type="number"
                                                        class="form-control @error('max_teams') is-invalid @enderror"
                                                        id="max_teams" name="max_teams"
                                                        value="{{ old('max_teams', $event->max_teams ?? 64) }}">
                                                    @error('max_teams')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Event Type and Shuttle Type -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Event Type -->
                                                        <div class="form-group">
                                                            <label for="event_type">Event Type</label>
                                                            <select
                                                                class="form-control @error('event_type') is-invalid @enderror"
                                                                id="event_type" name="event_type">
                                                                <option value="">Select Event Type</option>
                                                                <option value="Tournament"
                                                                    {{ old('event_type', $event->event_type ?? '') == 'Tournament' ? 'selected' : '' }}>
                                                                    Tournament
                                                                </option>
                                                                <option value="League"
                                                                    {{ old('event_type', $event->event_type ?? '') == 'League' ? 'selected' : '' }}>
                                                                    League
                                                                </option>
                                                                <option value="Friendly"
                                                                    {{ old('event_type', $event->event_type ?? '') == 'Friendly' ? 'selected' : '' }}>
                                                                    Friendly
                                                                </option>
                                                                <option value="Other"
                                                                    {{ old('event_type', $event->event_type ?? '') == 'Other' ? 'selected' : '' }}>
                                                                    Other
                                                                </option>
                                                            </select>
                                                            @error('event_type')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Shuttle Type -->
                                                        <div class="form-group">
                                                            <label for="shuttle_type">Shuttle Type</label>
                                                            <select
                                                                class="form-control @error('shuttle_type') is-invalid @enderror"
                                                                id="shuttle_type" name="shuttle_type">
                                                                <option value="">Select Shuttle Type</option>
                                                                <option value="feather"
                                                                    {{ old('shuttle_type', $event->shuttle_type ?? '') == 'feather' ? 'selected' : '' }}>
                                                                    Feather
                                                                </option>
                                                                <option value="nylon"
                                                                    {{ old('shuttle_type', $event->shuttle_type ?? '') == 'nylon' ? 'selected' : '' }}>
                                                                    Nylon
                                                                </option>
                                                            </select>
                                                            @error('shuttle_type')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Date -->
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date"
                                                        class="form-control @error('date') is-invalid @enderror"
                                                        id="date" name="date"
                                                        value="{{ $event->date ?? old('date') }}">
                                                    @error('date')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Event details and Location -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Event Detail -->
                                                <div class="form-group">
                                                    <!-- Event Detail -->
                                                    <label for="event_detail">Event Detail</label>
                                                    <select
                                                        class="form-control @error('event_detail') is-invalid @enderror"
                                                        id="event_detail" name="event_detail">
                                                        <option value="">Select Event Detail</option>
                                                        @foreach (['Doubles League (Feather)', 'Doubles League (Nylon)', 'Singles League (Feather)', 'Doubles Tournament (Cat C)', 'Doubles Tournament (Cat D)', 'Doubles Tournament (Open)', 'Singles Tournament (Cat C)', 'Singles Tournament (Cat D)', 'Singles Tournament (Open)', 'Mini Tournament (Doubles)', 'Mini Tournament (Singles)', 'Friendly (Singles)', 'Friendly (Doubles)', 'Other'] as $eventOption)
                                                            <option value="{{ $eventOption }}"
                                                                {{ old('event_detail', $event->event_detail ?? '') == $eventOption ? 'selected' : '' }}>
                                                                {{ $eventOption }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('event_detail')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <!-- location -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location">Location</label>
                                                    <input type="text"
                                                        class="form-control @error('location') is-invalid @enderror"
                                                        id="location" name="location"
                                                        value="{{ $event->location ?? old('location') }}">
                                                    @error('location')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Complete Results -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="complete_results">
                                                        Include Complete Results
                                                    </label>
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input @error('complete_results') is-invalid @enderror"
                                                            id="complete_results" name="complete_results" value="1"
                                                            {{ old('complete_results', $event->complete_results ?? false) ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="complete_results">Yes</label>
                                                    </div>

                                                    @error('complete_results')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="card-action" style="border-top: 0px !important">
                                            <button class="btn btn-success" type="submit">Update</button>
                                            <a href="{{ route('events.index') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const checkbox = document.getElementById('registered_with_badminton_england');
                console.log(checkbox);
                const registrationContainer = document.getElementById('registration_number_container');

                function toggleRegistrationNumber() {
                    registrationContainer.style.display = checkbox.checked ? 'block' : 'none';
                }

                // Attach event listener
                checkbox.addEventListener('change', toggleRegistrationNumber);

                // Initial visibility based on checkbox state
                toggleRegistrationNumber();
            });
        </script>


    @endsection
