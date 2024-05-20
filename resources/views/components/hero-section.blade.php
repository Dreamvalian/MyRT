<style>
  .hero-section {
    margin-top: 12rem;
  }

  .hero-section img {
    max-width: 100%;
    height: auto;
    width: 80%;
  }
</style>

<div class="hero-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-left">
        <h1 class="display-5 font-weight-bold">The online neighborhood management system.</h1>
        <p class="lead mb-4">Manage every <strong>house-to-house</strong>. Online 24x7.</p>
        <a href="{{ route('home-admin') }}" class="btn btn-primary btn-lg mb-2">
          Let's Get Started <i class="fas fa-arrow-right ml-2"></i>
        </a>
        <a href="#" class="btn btn-secondary btn-lg mb-2">
          Available on the App Store <i class="fab fa-apple ml-2"></i> <!-- Add icon here -->
        </a>
      </div>
      <div class="col-md-6 text-center">
        <img src="{{ asset('/') }}" alt="Neighborhood Management">
      </div>
    </div>
  </div>
</div>