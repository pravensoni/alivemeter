<?php if($common->CheckConfigurationSettings()) CheckLoginSession(); ?>
<header id="header" class="navbar">
  <ul class="nav navbar-nav navbar-avatar pull-right" style="margin-top:10px;">
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs-only">Welcome <?php echo $_SESSION['login_name']?></span> <b class="caret hidden-xs-only"></b> </a>
      <ul class="dropdown-menu">
	        <li><a href="login.php">Logout</a></li>
      </ul>
    </li>
  </ul>
  <a class="navbar-brand" href="#" style="margin-right:15px; padding-right:15px;">&nbsp;&nbsp;Nutrion</a>
  <button type="button" class="btn btn-link pull-left nav-toggle visible-xs" data-toggle="class:slide-nav slide-nav-left" data-target="body"> <i class="icon-reorder icon-xlarge text-default"></i> </button>
  <!--<ul class="nav navbar-nav hidden-xs">
    <li style="display:none;">
      <div class="m-t m-b-small" id="panel-notifications"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment-alt icon-xlarge text-default"></i><b class="badge badge-notes bg-danger count-n">2</b></a>
        <section class="dropdown-menu m-l-small m-t-mini">
          <section class="panel panel-large arrow arrow-top">
            <header class="panel-heading bg-white"><span class="h5"><strong>You have <span class="count-n">2</span> notifications</strong></span></header>
            <div class="list-group"> <a href="#" class="media list-group-item"> <span class="pull-left thumb-small"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span> <span class="media-body block m-b-none"> Moved to Bootstrap 3.0<br>
              <small class="text-muted">23 June 13</small> </span> </a> <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> first v.1 (Bootstrap 2.3 based) released<br>
              <small class="text-muted">19 June 13</small> </span> </a> </div>
            <footer class="panel-footer text-small"> <a href="#" class="pull-right"><i class="icon-cog"></i></a> <a href="#">See all the notifications</a> </footer>
          </section>
        </section>
      </div>
    </li>
      <li style="display:none;">
      	<div class="m-t-small"><a class="btn btn-sm btn-info" href="addcelebrity.php"><i class="icon-plus"></i>&nbsp;Add Celebrity</a></div>
        
    </li>
      <li style="display:none;">
      	<div class="m-t-small"><a class="btn btn-sm btn-info" data-toggle="modal" href="viewcelebrity.php"><i class="icon-flag"></i>&nbsp;View Celebrity</a></div>
        
    </li>
    <li class="dropdown shift" data-toggle="shift:appendTo" data-target=".nav-primary .nav" style="display:'';"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-xlarge visible-xs visible-xs-inline"></i>Celebrity Management <b class="caret hidden-sm-only"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="addcelebrity.php?menu_type=<?php echo $converter->encode("Celebrity")?>"> Add Celebrity</a></li>
        <li class="hidden-xs"> <a href="viewcelebrity.php?menu_type=<?php echo $converter->encode("Celebrity")?>">View Celebrity</a> </li>
       
      </ul>
    </li>
    
    
    <li class="dropdown shift" data-toggle="shift:appendTo" data-target=".nav-primary .nav" style="display:'';"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-xlarge visible-xs visible-xs-inline"></i>Masters <b class="caret hidden-sm-only"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="add_categories.php"> Add Category</a></li>
        <li class="hidden-xs"> <a href="view_categories.php">View Category</a> </li>
         <li> <a href="add_brands_cat.php">Add Brand Category</a></li>
        <li> <a href="view_brands_cat.php">View Brands Category</a> </li>
       
      </ul>
    </li>
    
    
    
    
  </ul>-->
 
</header>