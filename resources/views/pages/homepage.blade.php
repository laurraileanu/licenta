@extends('layouts.web.default')

@push('styles')
    <link rel="stylesheet" href="{{ elixir('css/pages/home.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/plugins/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/plugins/b-datepicker.css') }}">
@endpush

@section('content')
    <div class="container py-5">
        <div class="sqaured-section">
            <div class="section-heading text-center">
                <h2>Selectati data si ora rezervarii</h2>
            </div>
            <div class="section-body">
                <form action="search/table" id="search-table">
                    <div class="row align-items-end">
                        <div class="col-lg-3">
                            <label for="date">Data</label>
                            <div class="input-group material with-icon">
                                <i class="far fa-calendar"></i> 
                                <input type="text" id="date" name="date" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="timepicker">Ora</label>
                            <div class="input-group material with-icon">
                                <i class="far fa-clock"></i>
                                <input type="text" name="time" id="timepicker" required class="datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker"> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="guests">Persoane</label>
                            <div class="input-group material with-icon">
                                <i class="fas fa-users"></i>
                                <input type="text" name="guests" id="guests" required min="1" value="1"> 
                                <div class="qunatity-buttons">
                                    <button type="button" class="plus">+</button>
                                    <button type="button" class="minus">-</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <button id="search" class="btn btn-primary btn-lg w-100" type="submit">Cauta</button>
                        </div>
                    </div>
                </form>
                <div id="restaurant-map" class="d-none">
                    <div class="heading-container text-center">
                        <p id="head-text"></p>
                        <p class="small text-secondary">click pe o masa disponibila pentru a o rezerva</p>
                    </div>
                    <div class="map" id="map">
                        {{-- clasa 'disabled' pentru scaunele indisponibile ; fara clasa 'available' --}}
                        @foreach($tables as $table)
                            <a class="_table" href="javascript:void(0)" data-table-id="{{$table->id}}">{{$table->id}}</a>
                        @endforeach
                        <img src="{{asset('img/restaurant.png')}}">
                    </div>
                    <div>
                        <button id="reserve" class="btn btn-primary">
                            Rezerva
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ elixir('js/plugins/moment.js') }}"></script>
<script src="{{ elixir('js/plugins/b-datepicker.js') }}"></script>
<script src="{{ elixir('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ elixir('js/pages/home.js') }}"></script>
@endpush