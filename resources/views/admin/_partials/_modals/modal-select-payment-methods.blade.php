<!-- Payment Methods modal -->
<div class="modal fade" id="paymentMethods" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Select payment methods</h3>
          <p class="text-muted">Supported payment methods</p>
        </div>

        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
          <div class="d-flex gap-2 align-items-center">

            <img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png" />

            <h6 class="m-0">Visa</h6>
          </div>
          <h6 class="m-0 d-none d-sm-block">Credit Card</h6>
        </div>
        <div class="d-flex justify-content-sm-between align-items-center border-bottom pb-3 mb-3">
          <div class="d-flex gap-2 align-items-center">

            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />

            <h6 class="m-0">American Express</h6>
          </div>
          <h6 class="m-0 d-none d-sm-block">Credit Card</h6>
        </div>
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
          <div class="d-flex gap-2 align-items-center">

            <img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="master-card" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png" />

            <h6 class="m-0">Mastercard</h6>
          </div>
          <h6 class="m-0 d-none d-sm-block">Credit Card</h6>
        </div>
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
          <div class="d-flex gap-2 align-items-center">
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />
            <h6 class="m-0">JCB</h6>
          </div>
          <h6 class="m-0 d-none d-sm-block">Credit Card</h6>
        </div>
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
          <div class="d-flex gap-2 align-items-center">
            <img src="{{asset('assets/img/icons/payments/dc-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="diners-club-card" data-app-light-img="icons/payments/dc-light.png" data-app-dark-img="icons/payments/dc-dark.png" />
            <h6 class="m-0">Diners Club</h6>
          </div>
          <h6 class="m-0 d-none d-sm-block">Credit Card</h6>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- / Payment Methods modal -->
