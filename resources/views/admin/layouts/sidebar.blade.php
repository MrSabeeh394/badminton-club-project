  <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                  <img src="{{ asset('backend/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                      class="navbar-brand" height="20" />
              </a>
              <div class="nav-toggle">
                  <button class="btn btn-toggle toggle-sidebar">
                      <i class="gg-menu-right"></i>
                  </button>
                  <button class="btn btn-toggle sidenav-toggler">
                      <i class="gg-menu-left"></i>
                  </button>
              </div>
              <button class="topbar-toggler more">
                  <i class="gg-more-vertical-alt"></i>
              </button>
          </div>
          <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
              <ul class="nav nav-secondary">
                  <li class="nav-item active">
                      <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                          <i class="fas fa-home"></i>
                          <p>Dashboard</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="dashboard">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="../demo1/index.html">
                                      <span class="sub-item">Dashboard 1</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-section">
                      <span class="sidebar-mini-icon">
                          <i class="fa fa-ellipsis-h"></i>
                      </span>
                      <h4 class="text-section">Components</h4>
                  </li>
                  <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#players">
                          <i class="fas fa-users"></i>
                          <p>Players</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="players">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="{{ route('players.create') }}">
                                      <span class="sub-item">Add Player</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('players.index') }}">
                                      <span class="sub-item">View Player</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#teams">
                          <i class="fas fa-table"></i>
                          <p>Teams</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="teams">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="{{ route('teams.create') }}">
                                      <span class="sub-item"> Add Team</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('teams.index') }}">
                                      <span class="sub-item">View Teams</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                   <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#events">
                          <i class="fas fa-calendar-alt"></i>
                          <p>Events</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="events">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="{{ route('events.create') }}">
                                      <span class="sub-item"> Add Event</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('events.index') }}">
                                      <span class="sub-item">View Event</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#matches">
                          <i class="fas fa-map-marker-alt"></i>
                          <p>Matches</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="matches">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="{{ route('matches.create') }}">
                                      <span class="sub-item">Add Match</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('matches.index') }}">
                                      <span class="sub-item">View Matches</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#charts">
                          <i class="far fa-chart-bar"></i>
                          <p>Charts</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="charts">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="charts/charts.html">
                                      <span class="sub-item">Chart Js</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="charts/sparkline.html">
                                      <span class="sub-item">Sparkline</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a href="widgets.html">
                          <i class="fas fa-desktop"></i>
                          <p>Widgets</p>
                          <span class="badge badge-success">4</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="../../documentation/index.html">
                          <i class="fas fa-file"></i>
                          <p>Documentation</p>
                          <span class="badge badge-secondary">1</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#submenu">
                          <i class="fas fa-bars"></i>
                          <p>Menu Levels</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="submenu">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a data-bs-toggle="collapse" href="#subnav1">
                                      <span class="sub-item">Level 1</span>
                                      <span class="caret"></span>
                                  </a>
                                  <div class="collapse" id="subnav1">
                                      <ul class="nav nav-collapse subnav">
                                          <li>
                                              <a href="#">
                                                  <span class="sub-item">Level 2</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#">
                                                  <span class="sub-item">Level 2</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                              <li>
                                  <a data-bs-toggle="collapse" href="#subnav2">
                                      <span class="sub-item">Level 1</span>
                                      <span class="caret"></span>
                                  </a>
                                  <div class="collapse" id="subnav2">
                                      <ul class="nav nav-collapse subnav">
                                          <li>
                                              <a href="#">
                                                  <span class="sub-item">Level 2</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                              <li>
                                  <a href="#">
                                      <span class="sub-item">Level 1</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </div>
