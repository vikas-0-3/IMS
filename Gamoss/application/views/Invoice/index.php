

    <main class="main" id="skip-target">
      <div class="container">
        <div class="main-title-wrapper">
          <h2 class="main-title">Invoice</h2>
        </div>

        <div class="users-table white-block">
          <table class="users-table categories-table" id="myTable">
            <thead>
              <tr class="users-table-info">
                <!-- <th>
                  <label class="users-table__checkbox ms-20">
                    <input type="checkbox" class="check-all">
                  </label>
                </th> -->
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
                <th>Action</th>
            
                <th>Operation</th>
              </tr>
            </thead>
            <tbody>
            <?php $count = 1; foreach($invoiceData as $inv) {  ?>

              <tr>
                <!-- <td>
                  <label class="users-table__checkbox">
                    <input type="checkbox" class="check" id="<?= $pod["id"] ?>">
                  </label>
                </td> -->
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
                
                <?php if($_SESSION["userdata"]["user_role"] == "ADMIN") { ?>
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                    <?php if( $_SESSION["permission"]["admin_approve"] ) { ?>
                      <li><a href="<?= base_url() ?>invoice/adminStatusAccept/<?= $inv["id"] ?>">Accept</a></li>
                      <li><a href="<?= base_url() ?>invoice/adminStatusReject/<?= $inv["id"] ?>">Reject</a></li>
                      <?php } ?>
                    </ul>
                  </span>
                </td>
                <?php } ?>
                <?php if($_SESSION["userdata"]["user_role"] == "HR") { ?>
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                    <?php if( $_SESSION["permission"]["hr_approve"] ) { ?>
                      <li><a href="<?= base_url() ?>invoice/hrStatusAccept/<?= $inv["id"] ?>">Accept</a></li>
                      <li><a href="<?= base_url() ?>invoice/hrStatusReject/<?= $inv["id"] ?>">Reject</a></li>
                      <?php } ?>
                    </ul>
                  </span>
                </td>
                <?php } ?>

                <?php if($_SESSION["userdata"]["user_role"] == "VENDOR") { ?>
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                      <?php if($inv["hr_status"] == "ACCEPT" && $inv["admin_status"] == "ACCEPT") { ?>
                      <li><a href="<?= base_url() ?>invoice/uploadinvoice/<?= $inv["po_id"] ?>">Upload Invoice</a></li>
                      <?php } else { ?>
                        <li><a href="#" onclick="alert('Wait for Order to accept by hr and admin')">Upload Invoice</a></li>
                      <?php } ?>
                    </ul>
                  </span>
                </td>
                <?php } ?>
                  
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="more-horizontal" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                      <?php if( $_SESSION["permission"]["invoice_edit"] ) { ?>
                      <li><a href="<?= base_url() ?>invoice/edit/<?= $inv["id"] ?>">Edit</a></li>
                      <?php } ?>
                      <?php if( $_SESSION["permission"]["invoice_view"] ) { ?>
                      <li><a href="<?= base_url() ?>invoice/view/<?= $inv["id"] ?>">View</a></li>
                      <?php } ?>
                      <?php if( $_SESSION["permission"]["invoice_delete"] ) { ?>
                      <li><a href="<?= base_url() ?>invoice/delete/<?= $inv["id"] ?>">Delete</a></li>
                      <?php } ?>
                    </ul>
                  </span>
                </td>
              </tr>
              <?php $count++; } ?>
              
            </tbody>
          </table>
        </div>
        
      </div>
    </main>