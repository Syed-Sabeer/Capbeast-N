<!-- Add Payment Sidebar -->
<div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
  <div class="offcanvas-header mb-3">
    <h5 class="offcanvas-title">Add Payment</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body flex-grow-1">
    <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
      <p class="mb-0">Invoice Balance:</p>
      <p class="fw-medium mb-0">$5000.00</p>
    </div>
    <form>
      <div class="mb-3">
        <label class="form-label" for="invoiceAmount">Payment Amount</label>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" id="invoiceAmount" name="invoiceAmount" class="form-control invoice-amount" placeholder="100" />
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="payment-date">Payment Date</label>
        <input id="payment-date" class="form-control invoice-date" type="text" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="payment-method">Payment Method</label>
        <select class="form-select" id="payment-method">
          <option value="" selected disabled>Select payment method</option>
          <option value="Cash">Cash</option>
          <option value="Bank Transfer">Bank Transfer</option>
          <option value="Debit Card">Debit Card</option>
          <option value="Credit Card">Credit Card</option>
          <option value="Paypal">Paypal</option>
        </select>
      </div>
      <div class="mb-4">
        <label class="form-label" for="payment-note">Internal Payment Note</label>
        <textarea class="form-control" id="payment-note" rows="2"></textarea>
      </div>
      <div class="mb-3 d-flex flex-wrap">
        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      </div>
    </form>
  </div>
</div>
<!-- /Add Payment Sidebar -->
