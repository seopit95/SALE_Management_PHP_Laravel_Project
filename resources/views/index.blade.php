@extends('main')
@section('content')

  <!-- Slide Images -->
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade p-2 bg-light border" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner border border-secondary mb-2 border-opacity-25 ">
      <div class="carousel-item active">
        <img src="{{ asset('/my/img/123.jpg') }}" height="400" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/my/img/image2.jpg') }}" height="400" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/my/img/jeans.jpg') }}" height="400" class="d-block w-100">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection