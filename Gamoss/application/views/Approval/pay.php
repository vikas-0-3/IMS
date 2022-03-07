<main class="main" id="skip-target">
      <div class="container white-block">
        <div class="main-title-wrapper">
          <h2 class="main-title">Payment Details</h2>    
        </div>

        <?= form_open_multipart('approval/paymentChangeStatusAccept/'.$poID ); ?>
            <div class="row">
                <div class="col-sm">
                    <label>
                      <span class="new-page-label">Payment Status</span>
                        <select class="select transparent-btn" class="payment_status" name="payment_status" required>
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm">
                    <label>
                      <span class="new-page-label">Payment Note</span>
                      <input required type="text"  name="payment_note" placeholder="Enter note">
                    </label>
                </div>
                <div class="col-sm">
                    <label>
                      <span class="new-page-label">Payment Method</span>
                        <select class="select transparent-btn" class="payment_method" name="payment_method" required>
                            <option value="Cash">Cash</option>
                            <option value="UPI">UPI</option>
                            <option value="Credit Card">Credit card</option>
                            <option value="Debit Card">Debit card</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm">
                    <label>
                      <span class="new-page-label">Payment No</span>
                      <input required type="text"  name="payment_no" placeholder="Enter payment no">
                    </label>
                </div>
            </div>
            <br>
            <button class="primary-default-btn">Save</button>
            <?= form_close(); ?>
      </div>
    </main>