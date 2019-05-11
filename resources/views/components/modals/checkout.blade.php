<!-- Modal -->
<style>
    #checkoutModal .modal-dialog {
        width: 600px;
        max-width: 600px;
    }
    #checkoutModal .modal-header .close {
        padding: 0;
        margin: 0;
    }
    #checkoutModal .checkout-item-badge {
        background: #28a745;
        color: white;
        padding: 3px;
    }

    .section-title i {
        margin-right: 10px;
    }

    .order-list {
        padding: 3px;
    }
    .switch {
        display: inline-block;
        vertical-align: middle;
        width: 40px;
        height: 20px;
        margin: 0 8px;
        position: relative;
    }
   .switch .slider {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        border-radius: 30px;
        box-shadow: 0 0 0 2px #777, 0 0 4px #777;
        cursor: pointer;
        border: 4px solid transparent;
        overflow: hidden;
        transition: .4s;
    }
    .switch input:checked+.slider {
        box-shadow: 0 0 0 2px #32cd32, 0 0 2px #32cd32;
    }
    .switch input:checked+.slider:before {
        -webkit-transform: translateX(20px);
        transform: translateX(20px);
        background: #32cd32;
    }
    .switch input {
        display: none;
    }
    .switch .slider:before {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        background: #777;
        border-radius: 30px;
        -webkit-transform: translateX(-20px);
        transform: translateX(-20px);
        transition: .4s;
    }



    .checkout-login, .checkout-radio-btn, .checkout-register, .checkout-register-later {
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 20px;
        font-weight: 700;
        position: relative;
        cursor: pointer;
        transition: color .3s, opacity .3s;
        opacity: .5;
    }

    .button-or {
        height: 50px;
        width: 50px;
        background-color: #fff;
        position: absolute;
        right: -25px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        border: 1px solid #ddd;
        border-radius: 50%;
        z-index: 2;
        text-align: center;
        padding-top: 13px;
        font-weight: 700;
    }
    .checkout-section-title {
        font-size: 1.15rem;
    }
    .checkout-login.selected, .checkout-radio-btn.selected, .checkout-register-later.selected, .checkout-register.selected {
        opacity: 1;
        color: #761825;
        border-color: #761825;
    }
    .payment-methods{
        display: flex;
    }
    .payment-method {
        height: 136px;
        margin-right: 21px;
        margin-bottom: 20px;
        flex: 1;
        text-align: center;
    }
</style>
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center ml-auto mr-auto">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="checkout-section-modal mb-4">
                        <div class="checkout-section-title text-mon text-primary mb-2"><i class="ion-md-clipboard"></i>
                            Review your order
                        </div>
                        <div class="media">
                            <div class="media-body"><span
                                        class="checkout-item-badge badge badge-success">SOLO DIVISIONS</span><span
                                        class="checkout-item-name purchase"> Silver I (Promo: 1W-0L) - Diamond I</span>
                            </div>
                            <span class="text-mon font-weight-bold text-primary checkout-item-price"
                                  id="checkout-item-price"><!----> 581.90€ </span></div>
                    </div>
                    <div class="checkout-section-modal mb-4">
                        <div class="checkout-section-title text-mon text-primary mb-2"><i
                                    class="ion-md-person"></i> Authenticate yourself
                        </div><!----><!---->
                        <div class="row ng-star-inserted">
                            <div class="col-md-4 text-center">
                                <div class="checkout-login">
                                    <div class="circle-icon">
                                        <span class="text-main text-big">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    Login
                                </div>
                                <div class="button-or">OR</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="checkout-register">
                                    <div class="circle-icon"><span class="text-main text-big"><i class="fa fa-user-plus"></i></span></div>
                                    Register
                                </div>
                                <div class="button-or">OR</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="checkout-register-later selected">
                                    <div class="circle-icon"><span class="text-main text-big">
                                            <i class="fa fa-user-times"></i>
                                        </span>
                                    </div>
                                    Register later
                                </div>
                            </div>
                        </div><!----></div><!----><!---->
                    <div class="checkout-section-modal mb-4">
                        <div class="checkout-section-title text-mon text-primary mb-2">
                            <i class="fas fa-shipping-fast"></i> Express Order (+25%)
                            <label class="switch float-right ng-untouched ng-valid ng-dirty">
                                <input class="isExpress ng-untouched ng-valid ng-dirty" formcontrolname="isExpress"
                                       type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <p class="text-justify text-muted mb-4"> Ensure your order gets done with no
                            delays! Your order will be Top Priority Pick and will have a booster at all times! </p>
                    </div>
                    <div class="checkout-section-modal mb-4">
                        <div class="checkout-section-title text-mon text-primary mb-2">
                            <i class="ion-md-person"></i>  Account Information
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <div class="">
                                    <input id="account" type="account" class="form-control" name="account" value="" required="" autofocus="" placeholder="Account Username">
                                    <span class="help-block error">
                                </span>
                                </div>
                            </div>
                            <div class="form-group col-sm">
                                <div class="">
                                    <input id="password" type="password" class="form-control" name="password" value="" required="" autofocus="" placeholder="Account Password">
                                    <span class="help-block error">
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-section-modal">
                        <div class="checkout-section-title text-mon text-primary mb-4">
                            <i class="ion-md-cafe"></i> Select your payment method
                        </div>
                        <div class="payment-methods">
                            <div class="checkout-radio-btn payment-method selected" style="padding: 5px;">
                                <img src="{{asset("img/checkout/g2a-checkout-logo.png")}}" style="max-width: 100%;">
                            </div>
                            <div class="checkout-radio-btn payment-method" style="padding: 5px;">
                                <img src="{{asset("img/checkout/paypal-checkout-logo.png")}}" style="max-width: 100%;">
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary" type="button">
                            Purchase with G2A
                        </button>
                        <p class="text-justify text-muted mb-0">
                            <small>
                                By clicking the button above you accept our Terms of Service
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>