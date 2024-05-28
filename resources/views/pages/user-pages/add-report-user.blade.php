<!-- 
    Isina form buat create report
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
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
        class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="#!">Logout</a></li>
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
            <a class="nav-link" href="{{ url('home-users') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link" href="{{ url('add-report-user') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Add Report
            </a>
            <!-- <a class="nav-link" href="{{ url('tables') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Tables
            </a> -->
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          MyRT
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Add New Report</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('home-users') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Report</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-plus me-1"></i>
              Add New Report
            </div>
            <div class="card-body">
              <form action="{{ url('add-report-user') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="activityTitle" class="form-label">Report Title</label>
                  <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                  <label for="activityDescription" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="activityDate" class="form-label">Date Start</label>
                  <input type="date" class="form-control" id="date_start" name="date_start" required>
                </div>
                <div class="mb-3">
                  <label for="activityDate" class="form-label">Date End</label>
                  <input type="date" class="form-control" id="date_end" name="date_end" required>
                </div>
                <div class="mb-3">
                  <label for="activityPicture" class="form-label">Image</label>
                  <input type="file" class="form-control" id="picture" name="picture">
                </div>
                <button type="submit" class="btn btn-primary">Add Report</button>
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>