<header class="header" id="header">
        <div class="header__toggle" style="color:#000000;">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        
        <div class="header__img">
            <img src="assetsForSideBar/img/perfil.jpg" alt="">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar" style="background-color:#000000;">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav__logo" style="color:#ffffff;">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Online Pet Store NP</span>
                </a>

                <div class="nav__list" >
                    <a href="index.php" class="nav__link nav-home" style="color:#ffffff;">
                      <i class='bx bx-grid-alt nav__icon' ></i>
                      <span class="nav__name">Home</span>
                    </a>
                    <a href="index.php?page=orderManage" class="nav-orderManage nav__link " style="color:#ffffff;">
                      <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                      <span class="nav__name">Orders</span>
                    </a>
                    <a href="index.php?page=categoryManage" class="nav__link nav-categoryManage" style="color:#ffffff;">
                      <i class='bx bx-folder nav__icon' ></i>
                      <span class="nav__name">Category List</span>
                    </a>
                    <a href="index.php?page=menuManage" class="nav__link nav-menuManage" style="color:#ffffff;">
                      <i class='bx bx-message-square-detail nav__icon' ></i>
                      <span class="nav__name">Menu</span>
                    </a>
                    <a href="index.php?page=contactManage" class="nav__link nav-contactManage" style="color:#ffffff;">
                      <i class="fas fa-hands-helping"></i>
                      <span class="nav__name">contact Info</span>
                    </a>
                    <a href="index.php?page=userManage" class="nav__link nav-userManage" style="color:#ffffff;">
                      <i class='bx bx-user nav__icon' ></i>
                      <span class="nav__name">Users</span>
                    </a>
                    <!-- <a href="index.php?page=siteManage" class="nav__link nav-siteManage" style="color:#ffffff;">
                      <i class="fas fa-cogs"></i>
                      <span class="nav__name">Site Settings</span>
                    </a> -->
                </div>
            </div>
            <a href="partials/_logout.php" class="nav__link" style="color:#ffffff;">
              <i class='bx bx-log-out nav__icon' ></i>
              <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>  
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
	  $('.nav-<?php echo $page; ?>').addClass('active')
</script>
   