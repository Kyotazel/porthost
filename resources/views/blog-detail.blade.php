@extends('layouts.main')

@push('style')
    @livewireStyles
    <style>
        @media screen and (max-width: 600px) {
            img {
                width: 80%;
            }
        }
    </style>
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <section id="blog" class="text-center px-lg-5" style="min-height: 100vh">
        <div class="container">

            <div class="row p5-3 pb-5" data-aos="fade-up">
                <div class="col-lg-12">
                    <h1>{{$blog->title}}</h1>
                </div>
            </div>

            <div class="row gy-4 mt-2">

                <div class="col-md-8 text-start">
                    <img class="rounded-4 bg-light" style="width:90%; height:auto" src='{{ asset("storage/public/blog/$blog->image") }}' alt="">
                </div>
                <div class="col-md-12 text-start">
                    {!! $blog->content !!}
                </div>

            </div>
        </div>
    </section>
@endsection