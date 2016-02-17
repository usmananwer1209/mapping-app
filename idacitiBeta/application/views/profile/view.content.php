<div class="content">
	<div class="row">
		<div class="profile_area  col-md-12">
				<div class="administrator">
					<div class="admin_img m-t-5 clearfix">
                    <a href="<?php echo site_url('/profile/view/' . $obj->id); ?>">
						<img class="img-circle pull-left "  width="75" height="75" 
						src="<?php echo  avatar_url($obj)."?id=".uniqid(); ?>">
                    </a>
					</div>
					<div class="admin_info m-t-5">
						<div class="h3">
						<?php echo $obj->first_name.'.'.$obj->last_name; ?>
						<?php if($obj->id == $user->id){ ?>
							<a href="<?php echo site_url('profile/edit') ?>">
                                <i class="fa fa-edit"></i>
							</a>
						<?php } ?>
						</div>
						<small class="text-muted"> <i class="fa fa-map-marker"></i>
							<?php echo $obj->country; ?>
						</small>
					</div>
				</div>
				<div class="m-t-10 join-btn">
				<!--
					<a class="btn2 btn2-success btn2-rounded" href="javascript:;">
						<i class="fa fa-plus"></i> Ask to Join
					</a>
				-->
				</div>
				<div class="m-t-5 trusted-circle">
					<span class="text-uc text-xs text-muted">My Trusted circles</span><br/>
					<?php foreach ($circles as $circle) { ?>
						<small class="text-uc text-xs text-muted">
							<?php echo $circle['name']; ?>
						</small><br/>
					<?php } ?>
				</div>
				<div class="m-t-10 more-about">
					<span class="text-uc text-xs text-muted">More about me</span>
					<p>
                    <?php
                    $order = array("\r\n", "\n", "\r");
                    $replace = '<br />';
                    echo str_replace($order, $replace, $obj->about); //echo cut_string($obj->about, 100);
                    ?>
					</p>
				</div>
				<div class="m-t-10 connecting">
					<small class="text-uc text-xs text-muted">
						Connecting with <?php echo $obj->first_name.'.'.$obj->last_name; ?>
					</small>
					<p class="m-t-sm">
                    <?php
                    if (!empty($obj->linkedin_profile)) {
                        ?>
                        <a class="btn btn-rounded btn-twitter btn-icon" target="_blank"
                           href="<?php echo "http://" . $obj->linkedin_profile ?>">
							<i class="fa fa-linkedin"></i>
						</a>

                        <?php
                    }
                    ?>
                    <?php
                    /*if (!empty($obj->google_profile)) {
                        ?>
                        <a class="btn btn-rounded btn-gplus btn-icon" target="_blank"
                           href="<?php echo "http://" . $obj->google_profile ?>">
							<i class="fa fa-google-plus"></i>
						</a>

                        <?php
                    }*/
                    ?>
                    <?php
                    /*if (!empty($obj->facebook_profile)) {
                        ?>
                        <a class="btn btn-rounded btn-facebook btn-icon" target="_blank"
                           href="<?php echo "http://" . $obj->facebook_profile ?>">
							<i class="fa fa-facebook"></i>
						</a>
                        <?php
                    }*/
                    ?>
					<?php
                    if (!empty($obj->twitter_profile)) {
                        ?>
                        <a class="btn btn-rounded btn-twitter btn-icon" target="_blank"
                           href="<?php echo "http://" . $obj->twitter_profile ?>">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <?php
                    }
                    ?>
					</p>
				</div>
		</div>
	</div>
</div>
