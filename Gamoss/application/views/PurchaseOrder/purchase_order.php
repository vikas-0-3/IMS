

    <main class="main" id="skip-target">
      <div class="container">
        <div class="main-title-wrapper">
          <h2 class="main-title">Purchase Orders</h2>
          <?php if( $_SESSION["permission"]["po_add"] ) { ?>
          <a class="primary-default-btn" href="<?= base_url() ?>purchaseorder/add"><i data-feather="plus"></i>Add new</a>
          <?php } ?>
        </div>

        <div class="table-wrapper users-table white-block">
          <table class="categories-table" id="myTable">
            <thead>
              <tr class="users-table-info">
                <!-- <th>
                  <label class="users-table__checkbox ms-20">
                    <input type="checkbox" class="check-all">
                  </label>
                </th> -->
                <th>SNo</th>
                <th>Vendor name</th>
                <th>Date & Time</th>
                <th>PO Number</th>
                <th>Sub Total</th>
                <th>Tax amount</th>
                <th>Discount type / amount</th>
                <th>Grand Total</th>
                <th>Status</th>
                <?php if($_SESSION["userdata"]["user_role"] == "VENDOR") { ?>
                <th>Action</th>
                <?php } ?>
                <th>Operation</th>
              </tr>
            </thead>
            <tbody>
            <?php $count = 1; foreach($purchaseData as $pod) {  ?>

              <?php 
                if($_SESSION["userdata"]["user_role"] == "VENDOR") { 
                if($_SESSION["userdata"]["username"] == $pod["vendor_name"]) {
                ?>
              <tr>
                <!-- <td>
                  <label class="users-table__checkbox">
                    <input type="checkbox" class="check" id="<?= $pod["id"] ?>">
                  </label>
                </td> -->
                <td><?= $count; ?></td>
                <td><?= $pod["vendor_name"] ?></td>
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
     
                <?php if($_SESSION["userdata"]["user_role"] == "VENDOR") { ?>
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                    <?php if( $_SESSION["permission"]["po_approve"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/vendorchangeStatusAccept/<?= $pod["id"] ?>">Accept</a></li>
                      <li><a href="<?= base_url() ?>purchaseorder/vendorchangeStatusReject/<?= $pod["id"] ?>">Reject</a></li>
                      <?php } ?>
                      <?php if($pod['status'] == "ACCEPT") { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/addinvoice/<?= $pod["id"] ?>">Invoice</a></li>
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
                    <?php if( $_SESSION["permission"]["po_edit"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/edit/<?= $pod["id"] ?>">Edit</a></li>
                      <?php } ?>
                      <?php if( $_SESSION["permission"]["po_view"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/view/<?= $pod["id"] ?>">View</a></li>
                      <?php } ?>
                      <?php if( $_SESSION["permission"]["po_delete"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/delete/<?= $pod["id"] ?>">Delete</a></li>
                      <?php } ?>
                    </ul>
                  </span>
                </td>
              </tr>
              <?php } } else { ?>
                <tr>
                <!-- <td>
                  <label class="users-table__checkbox">
                    <input type="checkbox" class="check" id="<?= $pod["id"] ?>">
                  </label>
                </td> -->
                <td><?= $count; ?></td>
                <td><?= $pod["vendor_name"] ?></td>
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
     
                <?php if($_SESSION["userdata"]["user_role"] == "VENDOR") { ?>
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                    <?php if( $_SESSION["permission"]["po_approve"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/vendorchangeStatusAccept/<?= $pod["id"] ?>">Accept</a></li>
                      <li><a href="<?= base_url() ?>purchaseorder/vendorchangeStatusReject/<?= $pod["id"] ?>">Reject</a></li>
                      <?php } ?>
                      <?php if($pod['status'] == "ACCEPT") { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/addinvoice/<?= $pod["id"] ?>">Invoice</a></li>
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
                    <?php if( $_SESSION["permission"]["po_edit"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/edit/<?= $pod["id"] ?>">Edit</a></li>
                      <?php } ?>
                      <?php if( $_SESSION["permission"]["po_view"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/view/<?= $pod["id"] ?>">View</a></li>
                      <?php } ?>
                      <?php if( $_SESSION["permission"]["po_delete"] ) { ?>
                      <li><a href="<?= base_url() ?>purchaseorder/delete/<?= $pod["id"] ?>">Delete</a></li>
                      <?php } ?>
                    </ul>
                  </span>
                </td>
              </tr>
                <?php } ?>
              <?php $count++; } ?>
              
            </tbody>
          </table>
        </div>
        
      </div>
    </main>