<main class="main new-post-main" id="skip-target">
      <div class="container">
      <?= form_open_multipart('vendors/addvendorsdata'); ?>
          <div class="main-title-wrapper">
            <h2 class="main-title">Vendor Registration</h2>
          </div>
          <div class="row new-page__row">
            <div class="col-xl-12 col-md-12">
              <div class="main-content new-page-content">

                <div class="main-title-wrapper">
                  <h2 class="main-title">Add New Vendor</h2>

                </div>


                <div class="row">
                  <div class="col-sm">

                    <label>
                      <span class="new-page-label">Name</span>
                      <input required type="text" name="vendor_name" placeholder="Enter Name">
                    </label>
                    <label>
                      <span class="new-page-label">GST Number</span>
                      <input required type="text" name="gst_number" placeholder="Enter GST numver">
                    </label>
                    <label>
                      <span class="new-page-label">Mobie</span>
                      <input required type="text" name="vendor_mobile" placeholder="Enter Mobile">
                    </label>
                    <label>
                      <span class="new-page-label">Email</span>
                      <input required type="text" name="vendor_email" placeholder="Enter Email">
                    </label>
                    <label>
                      <span class="new-page-label">Password</span>
                      <input required type="password" name="vendor_password" placeholder="Enter Password">
                    </label>
                    
                    
                  </div>
                  <div class="col-sm">

                    <label>
                      <span class="new-page-label">Contact Person Name</span>
                      <input required type="text" name="vendor_contact_person_name" placeholder="Enter Contact Person Name">
                    </label>
                    <label>
                      <span class="new-page-label">Contact Person Mobile No</span>
                      <input required type="text" name="vendor_contact_person_mobile" placeholder="Enter Contact Person Mobile No">
                    </label>
                    <label>
                      <span class="new-page-label">Address</span>
                      <input required type="text" name="vendor_address" placeholder="Enter Address">
                    </label>
                    <label>
                      <span class="new-page-label">Site</span>
                      <input required type="text"  name="vendor_site" placeholder="Enter Site">
                    </label>
 
                    <div class="row">
                      <div class="col-sm">
                        <span class="new-page-label">Logo</span>
                        <input type="file" name="vendor_image" class="dropify" />
                      </div>
                      <div class="col-sm">
                        <label>
                          <span class="new-page-label">Status</span>
                            <select class="select transparent-btn" class="vendor_status" name="vendor_status" required>
                                <option value="Active">Active</option>
                                <option value="Pending">Pending</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </label>
                      </div>
                      
                    </div>
                      
                    </div>
                  </div>

                  <br>
                <hr>
                <br>
                <h2 class="main-title">User Permissions</h2>
                <div class="users-table white-block">
                    <div class="row">
                        <div class="col-1">
                            <div class="row">
                                <div class="col-sm">
                                    <span class="new-page-label">Select All</span>
                                </div>
                                <div class="col-sm">
                                    <input type="checkbox" id="select_all" >
                                </div>
                            </div>
                        </div>
                        <div class="col-11"></div>
                    </div>
                    <table class="posts-table">
                        <thead>
                            <tr class="users-table-info">
                            <th>Permission Name</th>
                            <th>Add</th>
                            <th>Edit</th>
                            <th>View</th>
                            <th>Delete</th>
                            <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vendors</td>
                                <td><input type="checkbox" class="check" style="margin-left:-50px;" name="vendor_add" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-45px;" name="vendor_edit" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-60px;" name="vendor_view" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-70px;" name="vendor_delete" ></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>purchase Order</td>
                                <td><input type="checkbox" class="check" style="margin-left:-50px;" name="po_add" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-45px;" name="po_edit" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-60px;" name="po_view" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-70px;" name="po_delete" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-90px;" name="po_approve" ></td>
                            </tr>
                            <tr>
                                <td>Invoice</td>
                                <td><input type="checkbox" class="check" style="margin-left:-50px;" name="invoice_add" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-45px;" name="invoice_edit" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-60px;" name="invoice_view" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-70px;" name="invoice_delete" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-90px;" name="invoice_approve" ></td>
                            </tr>
                            <tr>
                                <td>HR</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" class="check" style="margin-left:-90px;" name="hr_approve" ></td>
                            </tr>
                            <tr>
                                <td>Admin</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" class="check" style="margin-left:-90px;" name="admin_approve" ></td>
                            </tr>
                            <tr>
                                <td>Payment</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" class="check" style="margin-left:-90px;" name="payment_approve" ></td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <td><input type="checkbox" class="check" style="margin-left:-50px;" name="user_add" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-45px;" name="user_edit" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-60px;" name="user_view" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-70px;" name="user_delete" ></td>
                                <td><input type="checkbox" class="check" style="margin-left:-90px;" name="user_approve" ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="main-btns-wrapper">
                    <button class="primary-default-btn">Save</button>
                  </div>

                
                </div>
                
            </div>

          </div>
        <?= form_close(); ?>
      </div>
    </main>