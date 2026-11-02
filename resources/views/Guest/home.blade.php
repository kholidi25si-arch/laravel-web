@extends('Guest.layouts.app')

@section('title', 'Home')

@section('content')
    @include('Guest.partials.home.hero')
    @include('Guest.partials.home.about')
    @include('Guest.partials.home.services')
    @include('Guest.partials.home.appointment')
    @include('Guest.partials.home.pricing')
    @include('Guest.partials.home.team')
    @include('Guest.partials.home.search')
    @include('Guest.partials.home.testimonial')
    @include('Guest.partials.home.blog')
@endsection
