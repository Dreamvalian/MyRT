<!-- 
    Isina form buat add penduduk
 -->

<!-- 
    Isina form buat add kegiatan
 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Add Activity - MyRT</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ url('home-admin') }}">MyRT</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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
          <h1 class="mt-4">Add New Activity</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('home-admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('activity-admin') }}">Activity Admin</a></li>
            <li class="breadcrumb-item active">Add Activity</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-plus me-1"></i>
              Add New Activity
            </div>
            <div class="card-body">
              <form action="{{ url('activity-admin') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="activityTitle" class="form-label">Activity Title</label>
                  <input type="text" class="form-control" id="activityTitle" name="title" required>
                </div>
                <div class="mb-3">
                  <label for="activityDescription" class="form-label">Description</label>
                  <textarea class="form-control" id="activityDescription" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="activityDate" class="form-label">Date</label>
                  <input type="date" class="form-control" id="activityDate" name="date" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Activity</button>
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>