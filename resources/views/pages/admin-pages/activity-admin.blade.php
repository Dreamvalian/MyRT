<!--
    Content disini isina list kegiatan ngambil dari data kegiatan, data kegiatan ini bisa di CRUD sama si RT
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - MyRT</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('home-admin') }}">MyRT</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ url('home-admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Activity</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Admin
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('report-admin') }}">Report Admin</a>
                                <a class="nav-link" href="{{ url('activity-admin') }}">Activity Admin</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{url('charts')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{Auth::user()->nama}}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Activity Admin</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('home-admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Activity Admin</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Activity List
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="datatablesSimple2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Activity Name</th>
                                        <th>Date Start</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="activityList">
                                    @foreach ($activities as $act)
                                    <tr>
                                        <td>{{ $act->activity_id }}</td>
                                        <td>{{ $act->title }}</td>
                                        <td>{{ $act->date_start }}</td>


                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#activityModal{{$act->activity_id}}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('activity.edit', $act->activity_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('activity.destroy', $act->activity_id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?');"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="activityModal{{$act->activity_id}}" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="activityModalLabel">Detail Aktivitas</h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="activity_id" class="form-label">JUDUL KEGIATAN:</label>
                                                            <input type="text" class="form-control" id="title" value="{{$act->title}}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Description : </label>
                                                            <input type="text" class="form-control" id="description" value="{{$act->description}}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="date_start" class="form-label">Tanggal Mulai:</label>
                                                            <input type="text" class="form-control" id="date_start" value="{{$act->date_start}}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="date_start" class="form-label">Tanggal Selesai:</label>
                                                            <input type="text" class="form-control" id="date_end" value="{{$act->date_end}}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="picture" class="form-label">Picture:</label>
                                                            @if($act->picture)

                                                            <img src="{{ asset('storage/' . $act->picture) }}" class="img-fluid" alt="Activity Picture">
                                                            @else
                                                            <p>No picture available</p>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ url('add-activity-admin') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add New
                        Activity</a>
                </div>
            </main>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script>
            $(document).ready(function() {
                $('#activityList').on('click', '.btn-info', function() {
                    var button = $(this);
                    var activityId = button.data('activity_id');
                    var modal = $('#activityModal');
                    modal.find('#activity_id').val(activityId);
                    modal.modal('show');
                });
            });
        </script> -->