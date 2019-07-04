@extends('layouts.web.default')

@push('styles')
    <link rel="stylesheet" href="{{ elixir('css/pages/thank.css') }}">
@endpush

@section('content')
    <div class="container py-5">
        <div class="sqaured-section">
            <div class="section-heading text-center">
                <h2 class="clearfix">
                    Felicitari!
                </h2>
            </div>
            <div class="section-body">
                <div class="heading-container text-center">
                    <p class="alert alert-success">Rezervarea dumneavoastra a fost confirmata cu succes!</p>
                    <p class="small text-secondary alert alert-light">Pentru detalii sau anulari va rugam sa ne contactati telefonic la 07xx xxx xxx.</p>
                    <a href="{{ url('/') }}" class="btn btn-secondary btn-lg mt-5"><i class="fa fa-angle-left"></i> Inapoi</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ elixir('js/pages/home.js') }}"></script>
@endpush