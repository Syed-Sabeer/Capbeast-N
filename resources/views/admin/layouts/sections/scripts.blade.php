<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<script src="{{ asset(mix('assets/vendor/libs/sweetalert2/sweetalert2.js')) }}"></script>
<script src="{{ asset(mix('assets/js/extended-ui-sweetalert2.js')) }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->

<script>
    @if (Session::has('success'))
        Swal.fire({
            title: '{{__("Success!")}}',
            text: "{{ __(Session::get('success')) }}",
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if (Session::has('message'))
        Swal.fire({
            title: '{{__("Info!")}}',
            text: "{{ __(Session::get('message')) }}",
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if (Session::has('error'))
        Swal.fire({
            title: '{{__("Error!")}}',
            text: "{{ __(Session::get('error')) }}",
            icon: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    @endif
    // Delete confirmation with cancel message
    document.querySelectorAll('.delete_confirm').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default action

            const url = this.getAttribute('href'); // Get the href link

            Swal.fire({
              title: '{{__("Are you sure?")}}',
              text: '{{__("You would not be able to revert this!")}}',
              icon: 'warning',
              showCancelButton: true,
              cancelButtonText: '{{__("Cancel")}}',
              confirmButtonText: '{{__("Yes, delete it!")}}',
              customClass: {
                  confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                  cancelButton: 'btn btn-label-secondary waves-effect waves-light'
              },
              buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Redirect to delete URL
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                      title: "{{ __('Your data is safe!') }}",
                      icon: "info",
                      timer: 2000,
                      showConfirmButton: false
                    });
                }
            });
        });
    });
</script>
