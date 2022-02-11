<main class="main" id="skip-target">
      <div class="container">
        <h2 class="main-title">Purchase Order</h2>
        <div class="media-content">
          <div class="row">
            <div class="col-lg-3">
                <br><br>
              <h3 class="media-sidebar__title">Timeline</h3>
              <div class="media-sidebar" style="border-left: 4px dotted grey; margin-left:5px;">
                <ul class="quick-links" style="margin-left: -30px;">
                  <li>
                    <a class="success" href="##" <?php if($timeline["po_acknowledgement"] == 0) { ?> style="color:grey;" <?php } ?> >
                    <?php if($timeline["po_acknowledgement"] == 0) { ?>
                      <div class="quick-links-icon" style="background-color:grey;">
                        <span class="icon time-circle" aria-hidden="true"></span>                        
                      </div>
                      <?php  } else { ?>
                      <div class="quick-links-icon">
                      <i data-feather="check" style="color:white;"></i>
                      </div>
                      <?php } ?>
                      <div class="quick-links-text">
                        <span class="quick-links__title">ACKNOWLEDGEMENT</span>
                        <span class="quick-links__subtitle">PO Approved by vendor</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="success" href="##" <?php if($timeline["po_invoice"] == 0) { ?> style="color:grey;" <?php } ?> >
                    <?php if($timeline["po_invoice"] == 0) { ?>
                      <div class="quick-links-icon" style="background-color:grey;">
                        <span class="icon time-circle" aria-hidden="true"></span>                        
                      </div>
                      <?php  } else { ?>
                      <div class="quick-links-icon">
                      <i data-feather="check" style="color:white;"></i>
                      </div>
                      <?php } ?>
                      <div class="quick-links-text">
                        <span class="quick-links__title">CREATE INVOICE</span>
                        <span class="quick-links__subtitle">vendor create invoice</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="success" href="##" <?php if($timeline["po_hr"] == 0) { ?> style="color:grey;" <?php } ?> >
                    <?php if($timeline["po_hr"] == 0) { ?>
                      <div class="quick-links-icon" style="background-color:grey;">
                        <span class="icon time-circle" aria-hidden="true"></span>                        
                      </div>
                      <?php  } else { ?>
                      <div class="quick-links-icon">
                      <i data-feather="check" style="color:white;"></i>
                      </div>
                      <?php } ?>
                      <div class="quick-links-text">
                        <span class="quick-links__title">HR APPROVAL</span>
                        <span class="quick-links__subtitle">HR approved invoice</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="success" href="##" <?php if($timeline["po_admin"] == 0) { ?> style="color:grey;" <?php } ?>  >
                    <?php if($timeline["po_admin"] == 0) { ?>
                      <div class="quick-links-icon" style="background-color:grey;">
                        <span class="icon time-circle" aria-hidden="true"></span>                        
                      </div>
                      <?php  } else { ?>
                      <div class="quick-links-icon">
                      <i data-feather="check" style="color:white;"></i>
                      </div>
                      <?php } ?>
                      <div class="quick-links-text">
                        <span class="quick-links__title">FINAL APPROVE</span>
                        <span class="quick-links__subtitle">final approve by HR/Admin</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="success" href="##" <?php if($timeline["po_file"] == 0) { ?> style="color:grey;" <?php } ?> >
                    <?php if($timeline["po_file"] == 0) { ?>
                      <div class="quick-links-icon" style="background-color:grey;">
                        <span class="icon time-circle" aria-hidden="true"></span>                        
                      </div>
                      <?php  } else { ?>
                      <div class="quick-links-icon">
                      <i data-feather="check" style="color:white;"></i>
                      </div>
                      <?php } ?>
                      <div class="quick-links-text">
                        <span class="quick-links__title">FILE UPLOAD</span>
                        <span class="quick-links__subtitle">vendor upload invoice</span>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a class="success" href="##" <?php if($timeline["po_payment"] == 0) { ?> style="color:grey;" <?php } ?> >
                    <?php if($timeline["po_payment"] == 0) { ?>
                      <div class="quick-links-icon" style="background-color:grey;">
                        <span class="icon time-circle" aria-hidden="true"></span>                        
                      </div>
                      <?php  } else { ?>
                      <div class="quick-links-icon">
                      <i data-feather="check" style="color:white;"></i>
                      </div>
                      <?php } ?>
                      <div class="quick-links-text">
                        <span class="quick-links__title">PAYMENT</span>
                        <span class="quick-links__subtitle">payment done and received !</span>
                      </div>
                    </a>
                  </li>
                </ul>
           

              </div>
            </div>


            <div class="col-lg-9">
                <div class="row">
                    <div class="col-6">
                    <div class="media-dropzone">
                        <h3 class="media-dropzone__title media-sidebar__title">Order Details</h3>
                        <p>Status : <?= $allpurchase[0]["status"]; ?></p>
                        <p>PO Number : <?= $allpurchase[0]["po_number"]; ?></p>
                        <p>Vendor Name : <?= $allpurchase[0]["vendor_name"]; ?></p>
                        <p>Date & Time : <?= $allpurchase[0]["date_time"]; ?></p>
                    </div>

                    </div>
                    <div class="col-6">
                        <div class="media-dropzone">
                            <h3 class="media-dropzone__title media-sidebar__title">Price Details</h3>
                            <p>Sub Total : <?= $allpurchase[0]["sub_total"]; ?></p>
                            <p>Tax Amount : <?= $allpurchase[0]["tax_amount"]; ?></p>
                            <p>Discount : <?= $allpurchase[0]["discount_amount"]; ?> / <?= $allpurchase[0]["discount_type"]; ?></p>
                            <p>Grand Total : <?= $allpurchase[0]["total"]; ?></p>
                        </div>
                    </div>

  
                </div>

  
              <div class="sort-bar media-bar" style="margin-top:15px;">
              <h3 class="media-sidebar__title">Items</h3>
              </div>
              <div class="users-table table-wrapper">
                <table class="library-table">
                  <thead>
                    <tr class="users-table-info">
                      <th>&emsp;Item Name</th>
                      <th>Item Description</th>
                      <th>Item HSN</th>
                      <th>Item Quantity</th>
                      <th>Item Rate</th>
                      <th>Item Tax</th>
                      <th>Item Tax Type</th>
                      <th>Item Value</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for($i=0; $i<count($orderdetails); $i++) { ?>
                                                            
                        <tr id="<?= $i+1; ?>">
                            <td><?= $orderdetails[$i]["item_name"] ?></td>
                            <td><?= $orderdetails[$i]["item_description"] ?></td>
                            <td><?= $orderdetails[$i]["item_hsn"] ?></td>
                            <td><?= $orderdetails[$i]["item_quantity"] ?></td>
                            <td><?= $orderdetails[$i]["item_rate"] ?></td>
                            <td><?= $orderdetails[$i]["item_tax"] ?></td>
                            <td><?= $orderdetails[$i]["item_tax_type"] ?></td>
                            <td><?= $orderdetails[$i]["item_value"] ?></td>
                        </tr>


                    <?php } ?>
                  </tbody>
                </table>
              </div>

            </div>
            
          </div>
        </div>
      </div>
    </main>