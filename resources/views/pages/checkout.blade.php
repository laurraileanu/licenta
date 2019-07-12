@extends('layouts.web.default')

@push('styles')
    <link rel="stylesheet" href="{{ elixir('css/pages/checkout.css') }}">
@endpush

@section('content')
    <div class="container py-5">
        <div class="sqaured-section">
            <div class="section-heading text-center">
                <h2 class="clearfix">
                    <a href="javascript:history.back()" class="btn btn-secondary btn-sm float-left"><i class="fa fa-angle-left"></i> Inapoi</a>
                    Detaliile rezervarii
                </h2>
            </div>
            <div class="section-body">
                <div class="booking-details">
                    <div class="row">
                        <div class="col-6 text-right"><p>Data si ora: </p></div>
                        <div class="col-6 text-left"><span>{{$currentReservation['date']}} {{$currentReservation['time']}}</span></div>
                        <div class="col-6 text-right"><p>Mese pentru {{$currentReservation['guests']}} persoane:</p></div>
                        <div class="col-6 text-left">
                            <ul class="d-flex flex-wrap">
                                @foreach($currentReservation['selectedTables'] as $table)
                                        <li class="_table">{{$table}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <form class="checkout-form" id="checkout-form" action="{{route('checkout.submit')}}">
                    <div class="heading-container text-center">
                        <p>Formularul de rezervare</p>
                        <p class="small text-secondary">Completati formularul de mai jos cu datele necesare</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="last_name">Nume <sup class="text-danger">*</sup></label>
                            <div class="input-group material">
                                <input type="text" name="last_name" id="last_name" required > 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="first_name">Prenume <sup class="text-danger">*</sup></label>
                            <div class="input-group material">
                                <input type="text" name="first_name" id="first_name" required > 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email <sup class="text-danger">*</sup></label>
                            <div class="input-group material">
                                <input type="email" name="email" id="email" required > 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Telefon <sup class="text-danger">*</sup></label>
                            <div class="input-group material">
                                <input type="text" name="phone" id="phone" required > 
                            </div>
                        </div>
                        <div class="col-sm-12 mb-5">
                            <label for="mentions">Alte mentiuni (optional)</label>
                            <div class="input-group material">
                                <textarea type="text" name="notes" id="notes"> </textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between flex-wrap">
                                <a class="btn btn-secondary btn-lg " href="javascript:history.back()"><i class="fa fa-angle-left"></i> Inapoi</a>
                                <button class="btn btn-primary btn-lg " type="submit">Finalizeaza rezervarea</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ elixir('js/pages/home.js') }}"></script>
    <script>
        $(document).ready(()=>{
            $("#checkout-form").submit(function(e){
                let form = $("#checkout-form");
                e.preventDefault();
                console.log(form.attr('action'));
                axios.post(form.attr('action'),{

                    first_name: form.find('input[name="first_name"]').val(),
                    last_name:  form.find('input[name="last_name"]').val(),
                    phone:      form.find('input[name="phone"]').val(),
                    email:      form.find('input[name="email"]').val(),
                    notes:      form.find('textarea[name="notes"]').val()
                })  .then(function (response) {
                    window.location=response.data.redirect;
                })
                .catch(function (error) {
                    console.log(error);
                    let errors = error.response.data.errors;

                    Object.keys(errors).forEach((error)=>{
                        Notify(errors[error][0], null, null, 'danger');
                    });
                });
            });
        });
    </script>
@endpush