@extends('admin.layouts.master');
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Budget
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                      $24,500
                    </span>

                                <!-- Badge -->
                                <span class="badge badge-soft-success mt--1">
                      +3.5%
                    </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Total Hours
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                      763.5
                    </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Progress
                                </h6>

                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">

                                        <!-- Heading -->
                                        <span class="h2 mr-2 mb-0">
                          84.5%
                        </span>

                                    </div>
                                    <div class="col">

                                        <!-- Progress -->
                                        <div class="progress progress-sm">
                                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-clipboard text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Effective Hourly
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                      $85.50
                    </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-clock text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12 col-xl-4">

                <!-- Projects -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Projects
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Link -->
                                <a href="#!" class="small">View all</a>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Homepage Redesign</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 5hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Travels & Time</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 3hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Safari Exploration</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 10hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/projects/project-5.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Personal Site</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 4hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                    </div> <!-- / .card-body -->
                </div> <!-- / .card -->

            </div>
            <div class="col-12 col-xl-8">

                <!-- Goals -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Goals
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a href="#!" class="btn btn-sm btn-white">
                                    Export
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                            <tr>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-project">
                                        Goal
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-status">
                                        Status
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-progress">
                                        Progress
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-date">
                                        Due date
                                    </a>
                                </th>
                                <th class="text-right">
                                    Team
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <tr>
                                <td class="goal-project">
                                    Update the API
                                </td>
                                <td class="goal-status">
                                    <span class="text-warning">●</span> In progress
                                </td>
                                <td class="goal-progress">
                                    55%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">07/24/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Daniela Dewitt">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    Release v1.2-Beta
                                </td>
                                <td class="goal-status">
                                    <span class="text-warning">●</span> In progress
                                </td>
                                <td class="goal-progress">
                                    25%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">08/26/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    GDPR Compliance
                                </td>
                                <td class="goal-status">
                                    <span class="text-success">●</span> Completed
                                </td>
                                <td class="goal-progress">
                                    100%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">06/19/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    v1.2 Documentation
                                </td>
                                <td class="goal-status">
                                    <span class="text-danger">●</span> Cancelled
                                </td>
                                <td class="goal-progress">
                                    0%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">06/25/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="fe fe-more-vertical"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    Plan design offsite
                                </td>
                                <td class="goal-status">
                                    <span class="text-success">●</span> Completed
                                </td>
                                <td class="goal-progress">
                                    100%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">06/30/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Daniela Dewitt">
                                            <img src="{{asset('org/Dashkit-1.1.2/assets')}}/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
    </div>
@endsection