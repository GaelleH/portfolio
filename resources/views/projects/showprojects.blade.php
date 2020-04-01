@extends('layouts.app')

@section('content')
@if(!empty($project))
    <a href="{{ route('allProjects') }}" class="button button-small button-accent button-project"><i class="fa fa-arrow-left" aria-hidden="true"></i> Terug</a>
    @if(count($project->project_images) > 0)
        @foreach($project->project_images as $projectImage)
            <!-- Slideshow container -->
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                <div class="mySlides">
                    <img src="{{ asset('/files/'.$projectImage->project_image_path) }}" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                {{-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a> --}}
            </div>
        @endforeach
    @endif

    <section class="about-project">
        <div class="container">
            <div class="about-project-textbox">
                <h1>{{ $project->title }}</h1>
                <p>{!!$project->description!!}</p>
            </div>
        </div>
    </section>
@endif

<section class="cta-page">
    <div class="container">
        <h1 class="title title-cta">{{ $settings['contact_site_title'] }}</h1>
        <p style="margin-bottom:20px">{{ $settings['sub_contact_site_title'] }}</p>
        <a href="mailto:hello@gaellehardy.be" class="button button-dark">{{ $settings['button_contact_site_title'] }}</a>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <p style="font-size: 12px;color:white;">
                    Copyright <a style="color:white;" href="{{ route('login') }}">Gaëlle Hardy</a> 2020
                </p>
            </div>
            <div class="col-md-2">
                <p style="font-size: 12px;color:white;">
                    <a class="navbar-nav mr-auto" style="color:white;" href="{{ url('/page/'. $privacyPolicy->id) }}">Privacy beleid</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script>
var slideIndex = 0;
showSlides();

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 10000); // Change image every 2 seconds
} 
</script>
@endsection
