@extends('layouts.app')

@section('content')
@if(!empty($project))
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

    <div class="container">
        <section class="about-project">
            <div class="about-project-textbox">
                <h1>{{ $project->title }}</h1>
                <p>{!!$project->description!!}</p>
            </div>
        </section>
    </div>
@endif

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
