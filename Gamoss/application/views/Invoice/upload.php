<main class="main" id="skip-target">
      <div class="container white-block">
        <div class="main-title-wrapper">
          <h2 class="main-title">Upload Invoice</h2>    
        </div>

        <?= form_open_multipart('invoice/uploadinvoicedata'); ?>
            <div class="row">
                <div class="col-sm">
                <span class="new-page-label">Invoice</span>
                <input type="hidden" name="poid" value="<?= $poid ?>" >
                <input type="file" name="vendor_invoice" class="dropify" />

                <button class="primary-default-btn">Save</button>
                </div>
            </div>
            <?= form_close(); ?>
      </div>
    </main>