@extends('layouts.web.default')

@push('styles')
    <link rel="stylesheet" href="{{ elixir('css/pages/page.css') }}">
@endpush

@section('content')
<div class="page-heading pt-3 pb-2">
    <div class="container-fluid custom">
        <h2>Register</h2>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default py-5">
                <div class="panel-body">
                    <form class="form-horizontal form ajax-form" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <dt><label for="name" class="col-md-4 control-label">Name</label></dt>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                                    <span class="help-block error">
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <dt><label for="email" class="col-md-4 control-label">E-Mail Address</label></dt>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <span class="help-block error">
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <dt><label for="password" class="col-md-4 control-label">Password</label></dt>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="help-block error">
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <dt><label for="password-confirm" class="col-md-4 control-label">Confirm Password</label></dt>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button main px-3 text-uppercase">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('input').change(function() {
                if ($(this).hasClass('error')){
                    $(this).removeClass('error');
                    $(this).siblings('span').text('');
                }
            });
            function highlightFormError(form,key,value){
                let input = form.find('[name="'+key+'"]');
                input.addClass('error');
                input.siblings('span').text(value[0]);
            }
            $(".ajax-form").submit(function(event) {
                let form = $(this);
                event.preventDefault();
                let inputs = form.find("input, select, submit");
                inputs.removeClass("error");
                let formData = new FormData(form[0]);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if (data.redirect){
                            window.location.replace(data.redirect);
                        }
                    },
                    error:function(err){
                        let message = err.responseJSON.message;
                        let errors = err.responseJSON.errors;
                        if (errors!==null && (typeof errors)=== "object" ){
                            Object.keys(errors).forEach(function(key) {
                                highlightFormError(form,key,errors[key]);
                            });
                            if (errors.message){
                                form.find('.general-error').text(errors.message[0]);
                            }
                        }
                        else if (message !== null && (typeof message)==="string"){
                            form.find('.general-error').text(message);
                        }
                    }
                }).always(function(){
                    inputs.prop("disabled", false);
                });
            });
        });
    </script>
@endpush