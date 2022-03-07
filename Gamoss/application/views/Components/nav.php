
<div class="layer"></div>
<div class="page-flex">


<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="<?= base_url() ?>dashboard" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title"><?= $this->config->item('website_name') ?> </span>
                    <span class="logo-subtitle">ERP</span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>

        
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a <?php if(uri_string() == "dashboard") { ?>  class="active" <?php } ?> href="<?= base_url() ?>dashboard"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <?php if( $_SESSION["permission"]["vendor_view"] ) { ?>
                <li>
                    <a href="##" <?php if(uri_string() == "vendors" or uri_string() == "vendors/addvendors") { ?>  class="show-cat-btn active" <?php } else { ?> class="show-cat-btn"  <?php } ?>>
                        <span class="icon document" aria-hidden="true"></span>Vendors
                        <span class="category__btn transparent-btn" title="Open list">
                          <span class="sr-only">Open list</span>
                          <span class="icon arrow-down" aria-hidden="true"></span>
                      </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="<?= base_url() ?>vendors">All Vendors</a>
                        </li>
                        <?php if( $_SESSION["permission"]["vendor_add"] ) { ?>
                        <li>
                            <a href="<?= base_url() ?>vendors/addvendors">Add Vendors</a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
                <?php if( $_SESSION["permission"]["po_view"] ) { ?>
                <li>
                    <a <?php if(uri_string() == "purchaseorder" or uri_string() == "purchaseorder/add") { ?>  class="show-cat-btn active" <?php } else { ?> class="show-cat-btn"  <?php } ?> href="##">
                        <span class="icon folder" aria-hidden="true"></span>Purchase Order
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="<?= base_url() ?>purchaseorder">My Orders</a>
                        </li>
                        <?php if( $_SESSION["permission"]["vendor_add"] ) { ?>
                        <li>
                            <a href="<?= base_url() ?>purchaseorder/add">Add Orders</a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
                <?php if( $_SESSION["permission"]["invoice_view"] ) { ?>
                <li>
                    <a <?php if(uri_string() == "invoice" or uri_string() == "invoice/add") { ?>  class="show-cat-btn active" <?php } else { ?> class="show-cat-btn"  <?php } ?> href="##">
                        <span class="icon image" aria-hidden="true"></span>Invoice
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="<?= base_url() ?>invoice">Invoices</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if( $_SESSION["permission"]["hr_approve"] ) { ?>
                <li>
                    <a <?php if(uri_string() == "Approval/hr") { ?>  class="show-cat-btn active" <?php } else { ?> class="show-cat-btn"  <?php } ?> href="##">
                        <span class="icon paper" aria-hidden="true"></span>HR Approval
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="<?= base_url() ?>Approval/hr">HR Approval<span class="msg-counter"><?= hr_pending(); ?></span></a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if( $_SESSION["permission"]["admin_approve"] ) { ?>
                <li>
                    <a <?php if(uri_string() == "approval/admin") { ?>  class="show-cat-btn active" <?php } else { ?> class="show-cat-btn"  <?php } ?> href="##">
                        <span class="icon paper" aria-hidden="true"></span>Admin Approval
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                          <a href="<?= base_url() ?>approval/admin">Admin Approval<span class="msg-counter"><?= admin_pending(); ?></span></a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if( $_SESSION["permission"]["payment_approve"] ) { ?>
                  <li>
                  <a <?php if(uri_string() == "approval/payments" or uri_string() == "Approval/payapprove") { ?>  class="show-cat-btn active" <?php } else { ?> class="show-cat-btn"  <?php } ?> href="##">
                  <span class="icon message" aria-hidden="true"></span>
                        Payments
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                            
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                          <a href="<?= base_url() ?>approval/payments">Payment<span class="msg-counter"><?= pay_pending(); ?></span></a>
                        </li>
                        <li>
                          <a href="<?= base_url() ?>approval/completedpayments">Completed<span class="msg-counter"><?= pay_completed(); ?></span></a>
                        </li>
                    </ul>
                </li>

                <?php } ?>
            </ul>
            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
      
                <?php if( $_SESSION["permission"]["user_view"] ) { ?>
                <li>
                    <a  <?php if(uri_string() == "user" or uri_string() == "user/add") { ?>  class="show-cat-btn active" <?php } else { ?> class="show-cat-btn"  <?php } ?> href="##">
                        <span class="icon user-3" aria-hidden="true"></span>Users
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="<?= base_url() ?>user">All User</a>
                        </li>
                        <?php if( $_SESSION["permission"]["user_add"] ) { ?>
                        <li>
                            <a href="<?= base_url() ?>user/add">Add User</a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="<?= base_url(); ?>asset/img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="<?= base_url(); ?>asset/img/avatar/avatar-illustrated-01.png" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Nafisa Sh.</span>
                <span class="sidebar-user__subtitle">Support manager</span>
            </div>
        </a>
    </div>
</aside>


<div class="main-wrapper">
    <!-- ! Main nav -->
<nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start"></div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      <div class="lang-switcher-wrapper">
        <button class="lang-switcher transparent-btn" type="button">
          EN
          <i data-feather="chevron-down" aria-hidden="true"></i>
        </button>
        <ul class="lang-menu dropdown">
          <li><a href="##">English</a></li>
          <li><a href="##">French</a></li>
          <li><a href="##">Uzbek</a></li>
        </ul>
      </div>
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
      <div class="notification-wrapper">
        <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
          <span class="sr-only">To messages</span>
          <span class="icon notification active" aria-hidden="true"></span>
        </button>
        <ul class="users-item-dropdown notification-dropdown dropdown">
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">System just updated</span>
                <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                  here.</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon danger">
                <i data-feather="info" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">The cache is full!</span>
                <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                  interfere ...</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">New Subscriber here!</span>
                <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
              </div>
            </a>
          </li>
          <li>
            <a class="link-to-page" href="##">Go to Notifications page</a>
          </li>
        </ul>
      </div>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="<?= base_url(); ?>asset/img/user_images/<?= $_SESSION["userdata"]["image"] ?>" type="image/webp"><img src="<?= base_url(); ?>asset/img/user_images/<?= $_SESSION["userdata"]["image"] ?>" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="##">
              <i data-feather="user" aria-hidden="true"></i>
              <span><?= $_SESSION["userdata"]["username"] ?></span>
            </a></li>
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
          <li><a class="danger" href="<?= base_url(); ?>auth/logout">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>