@extends('layouts.web.default')

@push('styles')
    <link rel="stylesheet" href="{{ elixir('css/pages/home.css') }}">
@endpush

@section('content')
    <div class="container py-5">
        <div class="sqaured-section">
            <div class="section-heading">
                <h2>Selectati data si ora rezervarii</h2>
            </div>
            <div class="section-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="input-group material with-icon">
                                <i class="far fa-calendar"></i> 
                                <input type="text" name="date" id="date" required> 
                                <label for="date">Data</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group material with-icon">
                                <i class="far fa-clock"></i>
                                <input type="text" name="time" id="time" required> 
                                <label for="time">Ora</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group material with-icon">
                                <i class="fas fa-users"></i>
                                <input type="number" name="guests" id="guests" required min="1" value="1"> 
                                <label for="guests">Persoane</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-primary btn-lg w-100" type="submit">Cauta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ elixir('js/pages/home.js') }}"></script>
@endpush