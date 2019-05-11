<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form ajax-form" role="form" method="POST" action="{{ url(route('login')) }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <dt><label for="email" class="col-md-4 control-label">E-Mail</label></dt>
                        <div class="">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            <span class="help-block error">
                                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <dt><label for="password" class="col-md-4 control-label">Password</label></dt>
                        <div class="">
                            <input id="password" type="password" class="form-control" name="password" required>
                            <span class="help-block error">
                                </span>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="checkbox">
                                <dt><label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label></dt>
                            <p class="general-error error">

                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="button main px-3 text-uppercase" style="width:50%;margin:auto">
                                Login
                            </button>
                            <p>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </p>
                            <p>
                                <a class="btn btn-link" href="{{ url('/register') }}">
                                    Register
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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