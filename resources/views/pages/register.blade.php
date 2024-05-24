<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register - MyRT</title>
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Create Account</h3>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('register-process') }}">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="nama" type="text" name="nama" placeholder="Masukkan Nama Lengkap" autofocus>
                          <label for="nama">Nama Lengkap</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input class="form-control" id="nik" type="text" name="nik" placeholder="Masukkan NIK">
                          <label for="nik">Nomor Induk Kependudukan</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="nomor_kk" type="text" name="nomor_kk" placeholder="Masukkan Nomor KK">
                      <label for="nomor_kk">Nomor Kartu Keluarga</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" autocomplete="on">
                      <label for="email">Alamat Email</label>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="password" type="password" name="password" placeholder="Buat password">
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="nomor_telepon" type="tel" name="nomor_telepon" placeholder="Masukkan Nomor Telepon">
                          <label for="nomor_telepon">Nomor Telepon</label>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4 mb-0">
                      <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <!-- href ke halaman Login -->
                  <div class="small"><a href="/">Have an account? Go to login</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; MyRT {{ date('Y') }}</div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>