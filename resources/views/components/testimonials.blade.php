<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
  type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
  .testimonial-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
  }
</style>

<section class="neighborhood-testimonials text-center bg-light py-5">
  <div class="container">
    <h2 class="mb-5">What Our Community Says...</h2>
    <div class="row">
      <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
          <img class="img-fluid rounded-circle mb-3" src="{{ asset('images/testimonials-1.jpg') }}" alt="..." />
          <h5>Margaret E.</h5>
          <p class="font-weight-light mb-0">"This neighborhood management system is fantastic! Thanks so much, team!"
          </p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
          <img class="img-fluid rounded-circle mb-3" src="{{ asset('images/testimonials-2.jpg') }}" alt="..." />
          <h5>Fred S.</h5>
          <p class="font-weight-light mb-0">"The neighborhood management system is amazing. It's been instrumental in
            improving community organization and communication."</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
          <img class="img-fluid rounded-circle mb-3" src="{{ asset('images/testimonials-3.jpg') }}" alt="..." />
          <h5>Sarah W.</h5>
          <p class="font-weight-light mb-0">"Thank you so much for providing this neighborhood management system. It's
            been incredibly helpful and accessible."</p>
        </div>
      </div>
    </div>
  </div>
</section>