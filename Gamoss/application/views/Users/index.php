<main class="main" id="skip-target">
        <div class="container">
          <div class="main-title-wrapper">
            <h2 class="main-title">All Users</h2>
            <?php if( $_SESSION["permission"]["user_add"] ) { ?>
            <a class="primary-default-btn" href="<?= base_url() ?>user/add"><i data-feather="plus"></i>Add user</a>
            <?php } ?>
          </div>
    
          <div class="users-table white-block">
            <table class="posts-table" id="myTable">
              <thead>
                <tr class="users-table-info">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php $count=1;
                  foreach ($userdata as $vd) { ?>
                      <tr>
                      <td><?= $count; ?></td>
                      <td>
                        <!-- <label class="users-table__checkbox">
                          <input type="checkbox" class="check"> -->
                        <div class="pages-table-img">
                          <picture>
                            <source srcset="<?= base_url(); ?>asset/img/user_images/<?= $vd['image'] ?>" type="image/webp"><img
                              src="<?= base_url(); ?>asset/img/user_images/<?= $vd['image'] ?>" alt="User Name">
                          </picture>
                          <?= $vd['username']; ?>
                        </div>
                      </td>


                          <td><?= $vd['user_role']; ?></td>
                          <td><?= $vd['email']; ?></td>
                          <td><?= $vd['mobile']; ?></td>
                          <td>
                              <?php if($vd['status'] == "ACTIVE") { ?>
                                <span class="badge-active"><?= $vd['status'] ?></span>
                              <?php }
                              else if($vd['status'] == "PENDING") { ?>
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
                                <?php if( $_SESSION["permission"]["user_edit"] ) { ?>
                                <li><a href="<?= base_url(); ?>vendors/edituser/<?= $vd['id']; ?>" >Edit</a></li>
                                <?php } ?>
                                <?php if( $_SESSION["permission"]["user_view"] ) { ?>
                                <li><a href="<?= base_url(); ?>vendors/viewuser/<?= $vd['id']; ?>/#general">View</a></li>
                                <?php } ?>
                                <?php if( $_SESSION["permission"]["user_delete"] ) { ?>
                                <li><a href="<?= base_url(); ?>vendors/deleteuser/<?= $vd['id']; ?>">Delete</a></li>
                                <?php } ?>
                              </ul>
                            </span>

                      </tr>
                <?php $count++; } ?>




                
              </tbody>
            </table>
          </div>
          
        </div>
      </main>