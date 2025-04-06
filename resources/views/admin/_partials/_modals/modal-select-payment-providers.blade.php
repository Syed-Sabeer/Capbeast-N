<!-- Payment provider modal -->
<div class="modal fade" id="paymentProvider" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Select payment providers</h3>
          <p class="text-muted">Third-party payment providers</p>
        </div>

        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">

          <h6 class="m-0 mb-2 mb-sm-0 me-5">Adyen</h6>
          <div class="d-flex flex-wrap gap-2">
            <img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png" />
            <img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="master-card" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png" />
            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />
            <img src="{{asset('assets/img/icons/payments/dc-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="diners-club-card" data-app-light-img="icons/payments/dc-light.png" data-app-dark-img="icons/payments/dc-dark.png" />
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">

          <h6 class="m-0 mb-2 mb-sm-0">2Checkout</h6>
          <div class="d-flex flex-wrap gap-2">
            <img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png" />
            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />
            <img src="{{asset('assets/img/icons/payments/dc-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="diners-club-card" data-app-light-img="icons/payments/dc-light.png" data-app-dark-img="icons/payments/dc-dark.png" />
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
          <h6 class="m-0 mb-2 mb-sm-0">Airpay</h6>
          <div class="d-flex flex-wrap gap-2">
            <img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png" />
            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />
            <img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="master-card" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png" />
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />

          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
          <h6 class="m-0 mb-2 mb-sm-0">Authorize.net</h6>

          <div class="d-flex flex-wrap gap-2">
            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />
            <img src="{{asset('assets/img/icons/payments/dc-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="diners-club-card" data-app-light-img="icons/payments/dc-light.png" data-app-dark-img="icons/payments/dc-dark.png" />
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
          <h6 class="m-0 mb-2 mb-sm-0">Bambora</h6>

          <div class="d-flex flex-wrap gap-2">

            <img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="master-card" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png" />
            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />

          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
          <h6 class="m-0 mb-2 mb-sm-0">Cayan</h6>

          <div class="d-flex flex-wrap gap-2">
            <img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png" />
            <img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="master-card" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png" />
            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />
            <img src="{{asset('assets/img/icons/payments/dc-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="diners-club-card" data-app-light-img="icons/payments/dc-light.png" data-app-dark-img="icons/payments/dc-dark.png" />
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
          <h6 class="m-0 mb-2 mb-sm-0">Chase Paymentech (Orbital)</h6>

          <div class="d-flex flex-wrap gap-2">
            <img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png" />
            <img src="{{asset('assets/img/icons/payments/ae-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="american-express-card" data-app-light-img="icons/payments/ae-light.png" data-app-dark-img="icons/payments/ae-dark.png" />
            <img src="{{asset('assets/img/icons/payments/jcb-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="jcb-card" data-app-light-img="icons/payments/jcb-light.png" data-app-dark-img="icons/payments/jcb-dark.png" />
            <img src="{{asset('assets/img/icons/payments/dc-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="diners-club-card" data-app-light-img="icons/payments/dc-light.png" data-app-dark-img="icons/payments/dc-dark.png" />
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3">
          <h6 class="m-0 mb-2 mb-sm-0">Checkout.com</h6>
          <div class="d-flex flex-wrap gap-2">
            <img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png" />
            <img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png') }}" class="img-fluid w-px-50 h-px-30" alt="master-card" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png" />
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
<!-- / Payment provider modal -->
