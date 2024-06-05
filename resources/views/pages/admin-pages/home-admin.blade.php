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
          {{Auth::user()->nama}}
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
                        @error('create_error')

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">

                            <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
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
                                        <th>Status Perkawinan</th>
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
                                        <th>status perkawinan</th>
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
                                        <td>{{$rsd->status_perkawinan}}</td>
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
                    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addResidentModal"><i class="fas fa-plus"></i> Add New Data Penduduk</button>
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

    <!-- Modal for Viewing Resident Details -->
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
                        <table class="table" id="datatablesSimple2">
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
                                    <th>status perkawinan</th>
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
                                    <td>{{$resident->status_perkawinan}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="exportToCSV('residentModal{{$rsd->nomor_kk}}')">Export CSV</button>
                </div>
            </div>
        </div>
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
            <table class="table" id="datatablesSimple2">
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

    @endforeach

    <!-- Modal for Adding New Resident -->
    <div class="modal fade" id="addResidentModal" tabindex="-1" aria-labelledby="addResidentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addResidentModalLabel">Add New Resident</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addResidentForm" action="{{ route('add-resident') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>

                        <div class="mb-3">
                            <label for="nomor_kk" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" id="nomor_kk" name="nomor_kk" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Select</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" id="agama" name="agama" required>
                                <option value="">Select</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select class="form-select" id="pendidikan" name="pendidikan" required>
                                <option value="">Select</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Sarjana">Sarjana</option>
                                <option value="Magister">Magister</option>
                                <option value="Doktor">Doktor</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
                            <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
                                <option value="">Select</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Resident</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
