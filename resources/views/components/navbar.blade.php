<nav class="navbar navbar-expand-lg navbar-light fixed-top"
  style="background-color: rgba(255, 255, 255, 0.9); box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('images/logo-text-black.svg') }}" alt="Myrt Logo" height="30">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
          <a class="nav-link mt-2" href="#">About</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="/login">
            <button class="btn btn-primary">Sign In</button>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">
            <button class="btn btn-success">Sign Up</button>
          </a>
        </li>
        <li class="nav-item d-flex justify-content-center align-items-center">
          <a class="nav-link" href="#">
            <i class="fas fa-user fa-2x"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>