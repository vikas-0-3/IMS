<main class="main new-post-main" id="skip-target">
      <div class="container">
      <?= form_open_multipart('vendors/editvendorsdata'); ?>
          <div class="main-title-wrapper">
            <h2 class="main-title">Update Vendor</h2>
          </div>
          <div class="row new-page__row">
            <div class="col-xl-12 col-md-12">
              <div class="main-content new-page-content">

                <div class="main-title-wrapper">
                  <h2 class="main-title">Update Vendor</h2>
                 
                  <div class="main-btns-wrapper">
                    <!-- <select class="primary-white-btn transparent-btn me-11" required>
                      <option selected value="English">English</option>
                      <option value="French">French</option>
                      <option value="Uzbek">Uzbek</option>
                    </select> -->
                    <!-- <button class="primary-white-btn" type="button">Preview</button> -->
                    <button class="primary-default-btn">Save</button>
                    <!-- <button class="primary-white-btn" type="button"><i data-feather="x"></i>Cancel</button> -->
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm">

                    <label>
                      <span class="new-page-label">Name</span>
                      <input required type="text" name="vendor_name" placeholder="Enter Name" value="<?= $vendor['vendor_name'] ?>">
                    </label>
                    <label>
                      <span class="new-page-label">GST Number</span>
                      <input required type="text" name="gst_number" placeholder="Enter GST numver" value="<?= $vendor['gst_number'] ?>">
                    </label>
                    <label>
                      <span class="new-page-label">Mobie</span>
                      <input required type="text" name="vendor_mobile" placeholder="Enter Mobile" value="<?= $vendor['vendor_mobile'] ?>">
                    </label>
                    <label>
                      <span class="new-page-label">Email</span>
                      <input required type="text" name="vendor_email" placeholder="Enter Email" value="<?= $vendor['vendor_email'] ?>">
                    </label>
                    <label>
                      <span class="new-page-label">Password</span>
                      <input required type="password" name="vendor_password" placeholder="Enter Password">
                    </label>

                    

                   

                  </div>
                  <div class="col-sm">
                    <label>
                      <span class="new-page-label">Contact Person Name</span>
                      <input required type="text" name="vendor_contact_person_name" placeholder="Enter Contact Person Name" value="<?= $vendor['contact_person_name'] ?>">
                    </label>
                    <label>
                      <span class="new-page-label">Contact Person Mobile No</span>
                      <input required type="text" name="vendor_contact_person_mobile" placeholder="Enter Contact Person Mobile No" value="<?= $vendor['contact_person_mobile'] ?>">
                    </label>
                    <label>
                      <span class="new-page-label">Address</span>
                      <input required type="text" name="vendor_address" placeholder="Enter Address" value="<?= $vendor['vendor_address'] ?>">
                    </label>
                    <label>
                      <span class="new-page-label">Site</span>
                      <input required type="text"  name="vendor_site" placeholder="Enter Site" value="<?= $vendor['vendor_site'] ?>">
                    </label>

                    <div class="row">
                      <div class="col-sm">
                        
                        <span class="new-page-label">Logo</span>
                          <input type="file" name="vendor_image" class="dropify" />                          
                          <input type="hidden" name="imagevalue" value="<?= $vendor['vendor_images'] ?>">
                          <input type="hidden" name="vendorid" value="<?= $vendor['id'] ?>">
                      
                      </div>
                      <div class="col-sm">
                        <label>
                          <span class="new-page-label">Status</span>
                          <select class="select" class="vendor_status" name="vendor_status" required>
                              <option value="Active" <?php if ($vendor['status'] == 'Active') { ?>selected<?php } ?>>Active</option>
                              <option value="Pending" <?php if($vendor['status'] == 'Pending') { ?> selected <?php } ?>>Pending</option>
                              <option value="Inactive" <?php if($vendor['status'] == 'Inactive') { ?> selected <?php } ?>>Inactive</option>
                          </select>
                        </label>
                      </div>
                    </div>

                  </div>
                </div>



                
              </div>
            </div>

          </div>
        <?= form_close(); ?>
      </div>
    </main>