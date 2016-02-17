 <?php
 /* echo '<pre>';
  var_dump($my_circles);
  var_dump($cards);
  echo '</pre>';*/
 ?>
  <div class="page-sidebar" id="main-menu">
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">
      <div class="user-info-wrapper clearfix">
        <div class="profile-wrapper"> 
                <a href="<?php echo site_url('/profile/view/' . $user->id); ?>">
          <img 
              <?php $cache_id=uniqid(); ?>
              src="<?php echo $avatar."?id=".$cache_id; ?>"  alt="" 
              data-src="<?php echo $avatar."?id=".$cache_id; ?>" 
              data-src-retina="<?php echo $avatar."?id=".$cache_id; ?>" 
              width="69" height="69" /> 
                </a>
        </div>
        <div class="user-info">
          <div class="greeting">Welcome</div>
          <div class="username">
            <?php echo $user->first_name; ?>
            <span class="semi-bold">
              <?php echo $user->last_name; ?>
            </span>
          </div>
          
        </div>
      </div>
      
      <ul>

        <li class="<?php echo (module_active($current, 'Dashboard'))?'start active open':''; ?>"> 
        	<a href="term"> 
            <i class="icon-custom-home"></i> 
            <span class="title">Term Rule Manager</span>
          </a> 
        </li>
      
<!--         <li class="<?php //echo (module_active($current, 'Browse Cards'))?'start active open':''; ?>"> 
          <a href="<?php //echo site_url('sec');?>"> 
            <i class="fa fa-th"></i> 
            <span class="title">SEC Facts Loader</span>
          </a> 
        </li>

        <li class="<?php //echo (module_active($current, 'Dashboard'))?'start active open':''; ?>"> 
          <a href="stock"> 
            <i class="fa fa-dollar"></i> 
            <span class="title">US Stock Price Loader</span>
          </a> 
        </li>
      
        <li class="<?php //echo (module_active($current, 'Browse Cards'))?'start active open':''; ?>"> 
          <a href="<?php //echo site_url('data');?>"> 
            <i class="fa fa-th"></i> 
            <span class="title">China Data Loader</span>
          </a> 
        </li>  -->       

      </ul>    

      <div class="clearfix"></div>
    </div>
  </div>
  <div class="footer-widget">
    <p class="pull-left">Copyright &copy; <?php echo date('Y'); ?> idaciti, Inc.<br/> <a target="_blank" href="http://terms.idaciti.com/">Terms &amp; Privacy</a> </p>
    
    <div class="pull-right" style="padding-top: 10px;">
      <a href="<?php echo site_url('/login/logout');?>"><i class="fa fa-power-off"></i></a></div>
    </div>
  </div>
