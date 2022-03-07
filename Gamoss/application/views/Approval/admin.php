

    <main class="main" id="skip-target">
      <div class="container">
        <div class="main-title-wrapper">
          <h2 class="main-title">Admin Approval</h2>        
        </div>
        <div class="table-wrapper users-table white-block">
          <table class="categories-table" id="myTable">
            <thead>
              <tr class="users-table-info">
 
                <th>SNo</th>
                <th>Vendor name</th>
                <th>Date & Time</th>
                <th>PO Number</th>
                <th>Sub Total</th>
                <th>Tax amount</th>
                <th>Discount type / amount</th>
                <th>Grand Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $count = 1; if( count($AdminApproval) >0 ) {

            foreach($AdminApproval as $pod) {  ?>
              <tr>
                <td><?= $count; ?></td>
                <td><?= $pod["vendor_name"] ?></td>
                <td><?= $pod["created_at"] ?></td>
                <td><?= $pod["po"] ?></td>
                <td><?= $pod["sub_total"] ?></td>
                <td><?= $pod["tax_amount"] ?></td>
                <td><?= $pod["discount_type"] ?> / <?= $pod["discount_value"] ?></td>   
                <td><?= $pod["grand_total"] ?></td>
                <td>
                    <?php if($pod['admin_status'] == "PENDING") { ?>
                      <span class="badge-pending">PENDING</span>
                    <?php } else { ?>
                      <span class="badge-active">ACCEPT</span>
                    <?php } ?>
                </td>
     
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                      <li><a href="<?= base_url() ?>approval/adminChangeStatusAccept/<?= $pod["id"] ?>">Accept</a></li>
                      <li><a href="<?= base_url() ?>approval/adminChangeStatusReject/<?= $pod["id"] ?>">Reject</a></li>
                    </ul>
                  </span>
                </td>

              </tr>
              <?php $count++; } } ?>
              
            </tbody>
          </table>
        </div>
        
      </div>
    </main>