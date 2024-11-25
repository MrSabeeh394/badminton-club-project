@extends('admin.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Results</h3>
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
                        <a href="#">Results</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">View Results</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Matches</h4>
                                <a href="" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Result
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (isset($result))
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Team 1</th>
                                                <th>Team 2</th>
                                                <th>Score Team 1</th>
                                                <th>Score Team 2</th>
                                                <th>Is Final Result</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Team 1</th>
                                                <th>Team 2</th>
                                                <th>Score Team 1</th>
                                                <th>Score Team 2</th>
                                                <th>Is Final Result</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>{{ $result->team1->name }}</td>
                                                <td>{{ $result->team2->name }}</td>
                                                <td>{{ $result->score_team1 }}</td>
                                                <td>{{ $result->score_team2 }}</td>
                                                <td>{{ $result->is_final == 1 ? 'Yes' : 'No' }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('results.edit', $result->match_id) }}"
                                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                            title="Edit Result">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Remove Button -->
                                                        <form id="delete-result-{{ $result->match_id }}"
                                                            action="{{ route('results.destroy', $result->match_id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-link btn-danger btn-lg delete_alert_result"
                                                                data-result-id="{{ $result->match_id }}"
                                                                data-bs-toggle="tooltip" title="Remove Result">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-warning text-center">
                                    No result available for the given match ID.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
