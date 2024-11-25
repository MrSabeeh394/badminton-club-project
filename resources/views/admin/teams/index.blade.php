@extends('admin.main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Teams</h3>
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
                        <a href="#">Teams</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">View Teams</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Teams</h4>
                                <a href="{{ route('teams.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Team
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($teams as $team)
                                            <tr>
                                                <td>{{ $team->name }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('teams.edit', $team->id) }}"
                                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                            title="Edit Team">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Remove Button -->
                                                        <form id="delete-team-{{ $team->id }}"
                                                            action="{{ route('teams.destroy', $team->id) }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-link btn-danger btn-lg delete_alert_team"
                                                                data-team-id="{{ $team->id }}"
                                                                data-bs-toggle="tooltip" title="Remove Team">
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
