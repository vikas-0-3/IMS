<main class="main" id="skip-target">
      <div class="container">
        <h2 class="main-title">Vendor Data</h2>
        <div class="media-content">
          <div class="row">
            <div class="col-lg-12">
                <div class="row">
                <div class="col-4">
                        <div class="media-dropzone">
                            <img src="<?= base_url(); ?>asset/img/vendors/<?= $vendor["vendor_images"] ?>" alt="User name" height="218px" >
                        </div>
                    </div>
                    <div class="col-4">
                    <div class="media-dropzone" style="text-align:left;">
                        <h3 class="media-dropzone__title media-sidebar__title">Personal Details</h3>
                        <p><b>Name :</b> <?= $vendor["vendor_name"]; ?></p>
                        <p><b>Contact Number :</b> <?= $vendor["vendor_mobile"]; ?></p>
                        <p><b>Email Address :</b> <?= $vendor["vendor_email"]; ?></p>
                        <hr>
                        <p><b>GST Number :</b> <?= $vendor["gst_number"]; ?></p>
                        <p><b>Status :</b> <?= $vendor["status"]; ?></p>
                        <p><b>Created At :</b> <?= $vendor["created_at"]; ?></p>
                        <hr>
                        <p><b>Address :</b> <?= $vendor["vendor_address"]; ?></p>
                        <p><b>Site :</b> <?= $vendor["vendor_site"]; ?></p>
                        <br>
                    </div>

                    </div>
                    <div class="col-4">
                        <div class="media-dropzone" style="text-align:left;">
                            <h3 class="media-dropzone__title media-sidebar__title">Order Details</h3>
                            <p style="text-align:center;"><b>Total PO :</b> <?= $poCountData["accept"] + $poCountData["reject"] + $poCountData["pending"] ?></p>
                            <hr>
                            <p><b>PO Accept :</b> <?= $poCountData["accept"] ?></p>
                            <p><b>PO Reject :</b> <?= $poCountData["reject"] ?></p>
                            <p><b>PO Pending :</b> <?= $poCountData["pending"] ?></p>
                            <br>

                                <?php
                                $c = 0;
                                    $adminaccept = 0;
                                    $adminreject = 0;
                                    $adminpending = 0;
                                    $hraccept = 0;
                                    $hrreject = 0;
                                    $hrpending = 0;
                                    for ($x = 0; $x < count($invoiceData); $x++) {
                                        if(count($invoiceData[$x]) > 0) {
                                            foreach($invoiceData[$x] as $inv) { 
                                                 if($inv['hr_status'] == "ACCEPT") {   
                                                     $hraccept++;
                                                 }
                                                 if($inv['hr_status'] == "REJECT") {  
                                                     $hrreject++;
                                                 }
                                                 if($inv['hr_status'] == "PENDING") {  
                                                    $hrpending++;
                                                }

                                                if($inv['admin_status'] == "ACCEPT") {   
                                                    $adminaccept++;
                                                }
                                                if($inv['admin_status'] == "REJECT") {  
                                                    $adminreject++;
                                                }
                                                if($inv['admin_status'] == "PENDING") {  
                                                   $adminpending++;
                                               }

                                                $c++;
                                            } 
                                        } 
                                    } 
                                ?>


                            <p style="text-align:center;"><b>Total Invoice :</b> <?= $c ?></p>
                            <hr>
                            <div class="row">
                                <div class="col-sm">
                                    <p><b>Admin Accept :</b> <?= $adminaccept; ?></p>
                                    <p><b>Admin Reject :</b> <?= $adminreject; ?></p>
                                    <p><b>Admin Pending :</b> <?= $adminpending; ?></p>
                                </div>
                                <div class="col-sm">
                                    <p><b>HR Accept :</b> <?= $hraccept; ?></p>
                                    <p><b>HR Reject :</b> <?= $hrreject; ?></p>
                                    <p><b>HR Pending :</b> <?= $hrpending; ?></p>
                                </div>
                            </div>
                            
                          
                        </div>
                    </div>

  
                </div>
                    <br>
                    <br>
                <div class="container">
                        <nav class="tab-nav">
                            <ul class="tab-menu">
                            <li><a href="#general" class="active">PO</a></li>
                            <li><a href="#widgets">Invoice</a></li>
                            </ul>
                        </nav>
                        <article class="tab-content" id="general">
                            <div class="table-wrapper users-table">
                                <table class="categories-table">
                                    <thead>
                                    <tr class="users-table-info">
                                        <th>SNo</th>
                                    
                                        <th>Date & Time</th>
                                        <th>PO Number</th>
                                        <th>Sub Total</th>
                                        <th>Tax amount</th>
                                        <th>Discount type / amount</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; foreach($purchaseData as $pod) {  ?>
                                    <tr>
                                        <td><?= $count; ?></td>
  
                                        <td><?= $pod["date_time"] ?></td>
                                        <td><?= $pod["po_number"] ?></td>
                                        <td><?= $pod["sub_total"] ?></td>
                                        <td><?= $pod["tax_amount"] ?></td>
                                        <td><?= $pod["discount_type"] ?> / <?= $pod["discount_amount"] ?></td>   
                                        <td><?= $pod["total"] ?></td>
                                        <td>
                                            <?php if($pod['status'] == "ACCEPT") { ?>
                                            <span class="badge-active"><?= $pod['status'] ?></span>
                                            <?php }
                                            else if($pod['status'] == "PENDING") { ?>
                                            <span class="badge-pending"><?= $pod['status'] ?></span>
                                            <?php } else { ?>
                                            <span class="badge-trashed"><?= $pod['status'] ?></span>
                                            <?php } ?>
                                        </td>
                          
                                    </tr>
                                    <?php $count++; } ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </article>
                        <article class="tab-content" id="widgets">
                        <div class="table-wrapper users-table">
                        <table class="users-table categories-table" >
                                    <thead>
                                    <tr class="users-table-info">
                                        <th>SNo</th>
                                        <th>Invoice Number</th>
                                        <th>Created at</th>
                                        <th>ASN</th>
                                        <th>PO Number</th>
                                        <th>Sub Total</th>
                                        <th>Tax amount</th>
                                        <th>Discount type / amount</th>
                                        <th>Grand Total</th>
                                        <th>HR Status</th>
                                        <th>Admin Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1;

                                        for ($x = 0; $x < count($invoiceData); $x++) {
                                            if(count($invoiceData[$x]) > 0) {

                                                foreach($invoiceData[$x] as $inv) {  ?>

                                                    <tr>
                                                    <td><?= $count; ?></td>
                                                    <td><?= $inv["invoice_number"] ?></td>
                                                    <td><?= $inv["created_at"] ?></td>
                                                    <td><?= $inv["asn"] ?></td>
                                                    <td><?= $inv["po"] ?></td>
                                                    <td><?= $inv["sub_total"] ?></td>
                                                    <td><?= $inv["tax_amount"] ?></td>
                                                    <td><?= $inv["discount_type"] ?> / <?= $inv["discount_value"] ?></td>   
                                                    <td><?= $inv["grand_total"] ?></td>
                                                    <td>
                                                        <?php if($inv['hr_status'] == "ACCEPT") { ?>
                                                            <span class="badge-active"><?= $inv['hr_status'] ?></span>
                                                        <?php }
                                                        else if($inv['hr_status'] == "PENDING") { ?>
                                                            <span class="badge-pending"><?= $inv['hr_status'] ?></span>
                                                        <?php } else { ?>
                                                            <span class="badge-trashed"><?= $inv['hr_status'] ?></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($inv['admin_status'] == "ACCEPT") { ?>
                                                            <span class="badge-active"><?= $inv['admin_status'] ?></span>
                                                        <?php }
                                                        else if($inv['admin_status'] == "PENDING") { ?>
                                                            <span class="badge-pending"><?= $inv['admin_status'] ?></span>
                                                        <?php } else { ?>
                                                            <span class="badge-trashed"><?= $inv['admin_status'] ?></span>
                                                        <?php } ?>
                                                    </td>
                                                    
                                    
                                                    </tr>
                                                <?php $count++; } 

                                            }
                                        }
                                    ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </article>
                </div>




            </div>
            
          </div>
        </div>
      </div>
    </main>