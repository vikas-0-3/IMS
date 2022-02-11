<main class="main" id="skip-target">
        <div class="container">
          <div class="main-title-wrapper">
            <h2 class="main-title">All Vendors</h2>
            <?php if( $_SESSION["permission"]["vendor_add"] ) { ?>
            <a class="primary-default-btn" href="<?= base_url() ?>vendors/addvendors"><i data-feather="plus"></i>Add new</a>
            <?php } ?>
          </div>
    
          <div class="users-table white-block">
            <table class="posts-table" id="myTable">
              <thead>
                <tr class="users-table-info">
                  <th>
                    <label class="users-table__checkbox ms-20">Vendor
                    </label>
                  </th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Site</th>
                  <th>Registered at</th>
                  <th>GST Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  foreach ($vendorsdata as $vd) { ?>
                      <tr>
                      <td>
                        <!-- <label class="users-table__checkbox">
                          <input type="checkbox" class="check"> -->
                        <div class="pages-table-img">
                          <picture>
                            <source srcset="<?= base_url(); ?>asset/img/vendors/<?= $vd['vendor_images'] ?>" type="image/webp"><img
                              src="<?= base_url(); ?>asset/img/vendors/<?= $vd['vendor_images'] ?>" alt="User Name">
                          </picture>
                          <?= $vd['vendor_name']; ?>
                        </div>
                      </td>


                          <td><?= $vd['vendor_mobile']; ?></td>
                          <td><?= $vd['vendor_email']; ?></td>
                          <td><?= $vd['vendor_address']; ?></td>
                          <td><?= $vd['vendor_site']; ?></td>
                          <td><span class="posts-table__primary-text"><?= $vd['created_at']; ?></span></td>
                          <td><?= $vd['gst_number']; ?></td>

                          <td>
                              <?php if($vd['status'] == "Active") { ?>
                                <span class="badge-active"><?= $vd['status'] ?></span>
                              <?php }
                              
                              else if($vd['status'] == "Pending") { ?>
                                <span class="badge-pending"><?= $vd['status'] ?></span>
                             <?php } else { ?>
                                <span class="badge-trashed"><?= $vd['status'] ?></span>
                              <?php } ?>
                          </td>

                          <td>
                            <span class="p-relative">
                              <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                <div class="sr-only">More info</div>
                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                              </button>
                              <ul class="users-item-dropdown dropdown">
                              <?php if( $_SESSION["permission"]["vendor_edit"] ) { ?>
                                <li><a href="<?= base_url(); ?>vendors/editvendor/<?= $vd['id']; ?>" >Edit</a></li>
                                <?php } ?>
                                <?php if( $_SESSION["permission"]["vendor_view"] ) { ?>
                                <li><a href="<?= base_url(); ?>vendors/viewvendor/<?= $vd['id']; ?>/#general">View</a></li>
                                <?php } ?>
                                <?php if( $_SESSION["permission"]["vendor_delete"] ) { ?>
                                <li><a href="<?= base_url(); ?>vendors/deletevendor/<?= $vd['id']; ?>">Delete</a></li>
                                <?php } ?>
                              </ul>
                            </span>

                      </tr>
                <?php } ?>  
              </tbody>
            </table>
          </div>
          
        </div>
      </main>