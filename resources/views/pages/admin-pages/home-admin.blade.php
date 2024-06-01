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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <input class="form-control" id="tableSearch" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
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
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          MyRT
        </div>
      </nav>
    </div>
    <!-- Dashboard -->
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Dashboard</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Admin</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Data Penduduk
            </div>
            <div class="card-body">
              <table id="datatablesSimple1" class="table">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th>Nomor Kartu Keluarga</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NIK</th>
                    <th>NOMOR_KK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>jenis_kelamin</th>
                    <th>tempat_lahir</th>
                    <th>tanggal_lahir</th>
                    <th>agama</th>
                    <th>pendidikan</th>
                    <th>jenis_pekerjaan</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($residents as $rsd)
                  <tr>
                    <td>{{$rsd->nik}}</td>
                    <td>{{$rsd->nomor_kk}}</td>
                    <td>{{$rsd->nama_lengkap}}</td>
                    <td>{{$rsd->alamat}}</td>
                    <td>{{$rsd->jenis_kelamin}}</td>
                    <td>{{$rsd->tempat_lahir}}</td>
                    <td>{{$rsd->tanggal_lahir}}</td>
                    <td>{{$rsd->agama}}</td>
                    <td>{{$rsd->pendidikan}}</td>
                    <td>{{$rsd->jenis_pekerjaan}}</td>
                    <td>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#residentModal{{$rsd->nomor_kk}}">View Details
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <a href="#" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add New Data Penduduk</a>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; MyRT 2024</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Modal -->
  @foreach ($residents as $rsd)
  <div class="modal fade" id="residentModal{{$rsd->nomor_kk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Keluarga - {{$rsd->nama_lengkap}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card body">
            <table class="table" id="datatablesSimple">
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>NOMOR_KK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>jenis_kelamin</th>
                  <th>tempat_lahir</th>
                  <th>tanggal_lahir</th>
                  <th>agama</th>
                  <th>pendidikan</th>
                  <th>jenis_pekerjaan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($residents as $resident)
                @if ($resident->nomor_kk === $rsd->nomor_kk)
                <tr>
                  <td>{{$resident->nik}}</td>
                  <td>{{$resident->nomor_kk}}</td>
                  <td>{{$resident->nama_lengkap}}</td>
                  <td>{{$resident->alamat}}</td>
                  <td>{{$resident->jenis_kelamin}}</td>
                  <td>{{$resident->tempat_lahir}}</td>
                  <td>{{$resident->tanggal_lahir}}</td>
                  <td>{{$resident->agama}}</td>
                  <td>{{$resident->pendidikan}}</td>
                  <td>{{$resident->jenis_pekerjaan}}</td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="exportToCSV('residentModal{{$rsd->nomor_kk}}')">Export
            CSV</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>