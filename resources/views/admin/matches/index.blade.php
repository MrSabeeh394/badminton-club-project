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
                        <a href="#">View Matches</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Matches</h4>
                                <a href="{{ route('matches.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Match
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Event</th>
                                            <th>Team 1</th>
                                            <th>Team 2</th>
                                            <th>Event Type</th>
                                            <th>Points</th>
                                            <th>Match Sets</th>
                                            <th>Include Setting</th>
                                            <th>Match Results</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Event</th>
                                            <th>Team 1</th>
                                            <th>Team 2</th>
                                            <th>Event Type</th>
                                            <th>Points</th>
                                            <th>Match Sets</th>
                                            <th>Include Setting</th>
                                            <th>Match Results</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($matches as $match)
                                            <tr>
                                                <td>{{ $match->event->title }}</td>
                                                <td>{{ $match->team1->name }}</td>
                                                <td>{{ $match->team2->name }}</td>
                                                <td>{{ $match->type }}</td>
                                                <td>{{ $match->points }}</td>
                                                <td>{{ $match->sets }}</td>
                                                <td>{{ $match->setting == 1 ? 'Yes' : 'No' }}</td>
                                                <!-- Action for Result -->
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Add Result Button -->
                                                        <a href="{{ route('results.create', $match->id) }}"
                                                            class="btn btn-link btn-info btn-lg" data-bs-toggle="tooltip"
                                                            title="Add Result">
                                                            <i class="fa fa-plus"></i>
                                                        </a>

                                                        <!-- View Result Button -->
                                                        <a href="{{ route('results.show', $match->id) }}"
                                                            class="btn btn-link btn-secondary btn-lg"
                                                            data-bs-toggle="tooltip" title="View Result">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <!-- Edit Button -->
                                                        {{-- <a href="{{ route('results.edit', $match->id) }}"
                                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                            title="Edit Result">
                                                            <i class="fa fa-edit"></i>
                                                        </a> --}}

                                                        <!-- Remove Button -->
                                                        {{-- <form id="delete-result-{{ $match->id }}"
                                                            action="{{ route('results.destroy', $match->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-link btn-danger btn-lg delete_alert_result"
                                                                data-player-id="{{ $match->id }}"
                                                                data-bs-toggle="tooltip" title="Remove Result">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form> --}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('matches.edit', $match->id) }}"
                                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                            title="Edit Match">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Remove Button -->
                                                        <form id="delete-match-{{ $match->id }}"
                                                            action="{{ route('matches.destroy', $match->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-link btn-danger btn-lg delete_alert_match"
                                                                data-match-id="{{ $match->id }}"
                                                                data-bs-toggle="tooltip" title="Remove Match">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
