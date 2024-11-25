-@extends('admin.main')
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
                        <a href="#">Add Event </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Event</div>
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

                                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Title and Level -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        id="title" name="title" placeholder="Enter Title"
                                                        value="{{ old('title') }}">
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
                                                            {{ old('level') == 'Beginner' ? 'selected' : '' }}>
                                                            Beginner</option>
                                                        <option value="Intermediate"
                                                            {{ old('level') == 'Intermediate' ? 'selected' : '' }}>
                                                            Intermediate
                                                        </option>
                                                        <option value="Advanced"
                                                            {{ old('level') == 'Advanced' ? 'selected' : '' }}>
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
                                                            {{ old('team_type') == 'Singles' ? 'selected' : '' }}>Singles
                                                        </option>
                                                        <option value="Doubles"
                                                            {{ old('team_type') == 'Doubles' ? 'selected' : '' }}>Doubles
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
                                                        id="max_teams" name="max_teams" value="{{ old('max_teams', 64) }}">
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
                                                                    {{ old('event_type') == 'Tournament' ? 'selected' : '' }}>
                                                                    Tournament
                                                                </option>
                                                                <option value="League"
                                                                    {{ old('event_type') == 'League' ? 'selected' : '' }}>
                                                                    League
                                                                </option>
                                                                <option value="Friendly"
                                                                    {{ old('event_type') == 'Friendly' ? 'selected' : '' }}>
                                                                    Friendly
                                                                </option>
                                                                <option value="Other"
                                                                    {{ old('event_type') == 'Other' ? 'selected' : '' }}>
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
                                                                    {{ old('shuttle_type') == 'feather' ? 'selected' : '' }}>
                                                                    Feather
                                                                </option>
                                                                <option value="nylon"
                                                                    {{ old('shuttle_type') == 'nylon' ? 'selected' : '' }}>
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
                                                        id="date" name="date" value="{{ old('date') }}">
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
                                                        <option value="Doubles League (Feather)"
                                                            {{ old('event_detail') == 'Doubles League (Feather)' ? 'selected' : '' }}>
                                                            Doubles League (Feather)</option>
                                                        <option value="Doubles League (Nylon)"
                                                            {{ old('event_detail') == 'Doubles League (Nylon)' ? 'selected' : '' }}>
                                                            Doubles League (Nylon)</option>
                                                        <option value="Singles League (Feather)"
                                                            {{ old('event_detail') == 'Singles League (Feather)' ? 'selected' : '' }}>
                                                            Singles League (Feather)</option>
                                                        <option value="Doubles Tournament (Cat C)"
                                                            {{ old('event_detail') == 'Doubles Tournament (Cat C)' ? 'selected' : '' }}>
                                                            Doubles Tournament (Cat C)</option>
                                                        <option value="Doubles Tournament (Cat D)"
                                                            {{ old('event_detail') == 'Doubles Tournament (Cat D)' ? 'selected' : '' }}>
                                                            Doubles Tournament (Cat D)</option>
                                                        <option value="Doubles Tournament (Open)"
                                                            {{ old('event_detail') == 'Doubles Tournament (Open)' ? 'selected' : '' }}>
                                                            Doubles Tournament (Open)</option>
                                                        <option value="Singles Tournament (Cat C)"
                                                            {{ old('event_detail') == 'Singles Tournament (Cat C)' ? 'selected' : '' }}>
                                                            Singles Tournament (Cat C)</option>
                                                        <option value="Singles Tournament (Cat D)"
                                                            {{ old('event_detail') == 'Singles Tournament (Cat D)' ? 'selected' : '' }}>
                                                            Singles Tournament (Cat D)</option>
                                                        <option value="Singles Tournament (Open)"
                                                            {{ old('event_detail') == 'Singles Tournament (Open)' ? 'selected' : '' }}>
                                                            Singles Tournament (Open)</option>
                                                        <option value="Mini Tournament (Doubles)"
                                                            {{ old('event_detail') == 'Mini Tournament (Doubles)' ? 'selected' : '' }}>
                                                            Mini Tournament (Doubles)</option>
                                                        <option value="Mini Tournament (Singles)"
                                                            {{ old('event_detail') == 'Mini Tournament (Singles)' ? 'selected' : '' }}>
                                                            Mini Tournament (Singles)</option>
                                                        <option value="Friendly (Singles)"
                                                            {{ old('event_detail') == 'Friendly (Singles)' ? 'selected' : '' }}>
                                                            Friendly (Singles)</option>
                                                        <option value="Friendly (Doubles)"
                                                            {{ old('event_detail') == 'Friendly (Doubles)' ? 'selected' : '' }}>
                                                            Friendly (Doubles)</option>
                                                        <option value="Other"
                                                            {{ old('event_detail') == 'Other' ? 'selected' : '' }}>Other
                                                        </option>
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
                                                        id="location" name="location" value="{{ old('location') }}">
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
                                                            {{ old('complete_results') ? 'checked' : '' }} />
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
                                            <button class="btn btn-success" type="submit">Submit</button>
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
