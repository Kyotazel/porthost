@extends('layouts.main')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('description', $service->short_content)

@section('content')
    <section id="service" class="text-center px-lg-5" style="min-height: 100vh">
        <div class="container">

            <div class="row pt-5 pb-5" data-aos="fade-up">
                <div class="col-lg-12">
                    <h1>{{$service->title}}</h1>
                </div>
            </div>

            <div class="row gy-4 mt-4">

                <div class="col-md-12 text-start">
                    {!! $service->content !!}
                </div>

            </div>
        </div>
    </section>
@endsection