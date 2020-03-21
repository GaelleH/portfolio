@extends('layouts.app')

@section('content')
<section class="home-hero">
    <div class="container">
        <h1 class="title">Hello I'm Gaëlle Hardy</h1>
        <h3>Web developer</h3>
        <a href="mailto:gaelle_hardy1@hotmail.com" class="button button-accent">Contact me</a>
    </div>
</section>

@foreach($contentBlocks as $contentBlock)
    @if($contentBlock->internal_name == 'about-me')
        <div class="container">
            <section class="home-about">
                <div class="home-about-textbox">
                    <h1>{{ $contentBlock->title }}</h1>
                    <p>{{ $contentBlock->description }}</p>
                </div>
            </section>
        </div>
    @endif
@endforeach

<section class="portfolio">
    <h1>Some of our work</h1>
    @if(!empty($projects))
        @foreach($projects as $project)
            <figure class="port-item">
                <img src="{{ asset('/files/'.$project->project_images[0]->project_image_path) }}" alt="portfolio item">
                <figcaption class="port-desc">
                    <p>{{ $project->title }}</p>
                    <a href="project/{{$project->id}}" class="button button-accent button-small">See Project</a>
                </figcaption>
            </figure>
        @endforeach
    @endif
</section>

{{-- <section class="cta">
    <div class="container">
        <h1 class="title title-cta">{{$setting->contact_site_title}}</h1>
        <p style="margin-bottom:20px">{{$setting->sub_contact_site_title}}</p>
        <a href="" class="button button-dark">{{$setting->dark_button_text}}</a>
    </div>
</section> --}}

<footer>
    <p><a href="{{ route('login') }}">Gaëlle Hardy</a></p>
</footer>
@endsection
