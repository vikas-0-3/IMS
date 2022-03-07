<main class="main new-post-main" id="skip-target">
      <div class="container">
      <?= form_open_multipart('user/adduserdata'); ?>
          <div class="main-title-wrapper">
            <h2 class="main-title">User Registration</h2>
          </div>
            <div class="row new-page__row">
                <div class="col-xl-12 col-md-12">
                    <div class="main-content new-page-content">

                        <div class="main-title-wrapper">
                            <h2 class="main-title">Add New User</h2>

                        </div>


                        <div class="row">
                        <div class="col-sm">

                            <div class="row">
                                <div class="col-sm">
                                    <span class="new-page-label">Image</span>    
                                    <input type="file" name="user_image" class="" />
                                </div>
                                <div class="col-sm">
                                    <label>
                                        <div class="white-block" style="padding:0">
                                            <span class="new-page-label">Status</span>
                                            <select class="select transparent-btn" name="user_status" required>
                                                <option value="ACTIVE">Active</option>
                                                <option value="PENDING">Pending</option>
                                                <option value="INACTIVE">Inactive</option>
                                            </select>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label>
                                        <div class="white-block" style="padding:0">
                                            <span class="new-page-label">Designation</span>
                                            <select class="select transparent-btn" name="user_designation" required>
                                                <option value="ADMIN">Admin</option>
                                                <option value="ACCOUNTANT">Accountant</option>
                                                <option value="HR">HR</option>
                                            </select>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <label>
                            <span class="new-page-label">Username</span>
                            <input required type="text" name="username" placeholder="Enter Username">
                            </label>
                            <label>
                            <span class="new-page-label">Password</span>
                            <input required type="password" name="password" placeholder="Enter Password">
                            </label>
                            
                            
                        </div>
                        <div class="col-sm">
                            <label>
                            <span class="new-page-label">Mobile</span>
                            <input required type="text" name="user_mobile" placeholder="Enter Mobile Number">
                            </label>
                            <label>
                            <span class="new-page-label">Email</span>
                            <input required type="text" name="user_email" placeholder="Enter Email Address">
                            </label>
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

