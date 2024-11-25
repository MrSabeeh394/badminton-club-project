@extends('admin.main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">events</h3>
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
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">events</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">events</h4>
                                <a href="{{ route('events.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add event
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Level</th>
                                            <th>Team Type</th>
                                            <th>No of Teams</th>
                                            <th>Event Type</th>
                                            <th>Event Deatil</th>
                                            <th>Shuttle Type</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Complete Results</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Level</th>
                                            <th>Team Type</th>
                                            <th>No of Teams</th>
                                            <th>Event Type</th>
                                            <th>Event Deatil</th>
                                            <th>Shuttle Type</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Complete Results</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $event->title }}</td>
                                                <td>{{ $event->level }}</td>
                                                <td>{{ $event->team_type }}</td>
                                                <td>{{ $event->max_teams }}</td>
                                                <td>{{ $event->event_type }}</td>
                                                <td>{{ $event->event_detail }}</td>
                                                <td>{{ $event->shuttle_type }}</td>
                                                <td>{{ $event->date }}</td>
                                                <td>{{ $event->location }}</td>
                                                <td>{{ $event->complete_results ? 'Yes' : 'No' }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('events.edit', $event->id) }}"
                                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                            title="Edit event">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Remove Button -->
                                                        <form id="delete-event-{{ $event->id }}"
                                                            action="{{ route('events.destroy', $event->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-link btn-danger btn-lg delete_alert_event"
                                                                data-event-id="{{ $event->id }}"
                                                                data-bs-toggle="tooltip" title="Remove event">
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
