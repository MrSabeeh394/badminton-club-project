@extends('admin.main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Players</h3>
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
                        <a href="#">Players</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">View Players</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Players</h4>
                                <a href="{{ route('players.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Player
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Date of Birth</th>
                                            <th>Email</th>
                                            <th>Contact NO</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Photo</th>
                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Date of Birth</th>
                                            <th>Email</th>
                                            <th>Contact NO</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($players as $player)
                                            <tr>
                                                <td>
                                                    @if ($player->picture)
                                                        <img src="{{ asset('storage/' . $player->picture) }}"
                                                            alt="Player Image"
                                                            style="width: 50px; height: 50px; border-radius: 100px; border: 2px solid #ccc; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $player->first_name }}</td>
                                                <td>{{ $player->surname }}</td>
                                                <td>{{ $player->year_of_birth }}</td>
                                                <td>{{ $player->email }}</td>
                                                <td>{{ $player->contact_number }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- View Button -->
                                                        <a href="{{ route('players.show', $player->id) }}"
                                                            class="btn btn-link btn-secondary btn-lg"
                                                            data-bs-toggle="tooltip" title="View Player">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <!-- Edit Button -->
                                                        <a href="{{ route('players.edit', $player->id) }}"
                                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                            title="Edit Player">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Remove Button -->
                                                        <form id="delete-player-{{ $player->id }}"
                                                            action="{{ route('players.destroy', $player->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-link btn-danger btn-lg delete_alert_player"
                                                                data-player-id="{{ $player->id }}"
                                                                data-bs-toggle="tooltip" title="Remove Player">
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
