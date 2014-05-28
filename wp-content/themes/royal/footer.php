    <?php if(!is_page_template('page-welcome.php')) { ?>
    </div><!-- end of wrapper -->
    <?php } ?>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-lg-offset-2 col-md-offset-2 text-center">
                    <ul class="list-inline">
                    	<?php if( !get_option('custom_options_facebook_url')=='' ) { ?>
                        <li><a href="<?php echo get_option('custom_options_facebook_url'); ?>"><i class="fa fa-facebook fa-3x"></i></a></li>
                      <?php } ?>
                      <?php if( !get_option('custom_options_twitter_url')=='' ) { ?>
                        <li><a href="<?php echo get_option('custom_options_twitter_url'); ?>"><i class="fa fa-twitter fa-3x"></i></a></li>
                      <?php } ?>
                     <?php if( !get_option('custom_options_instagram_url')=='' ) { ?>
                        <li><a href="<?php echo get_option('custom_options_twitter_url'); ?>"><i class="fa fa-instagram fa-3x"></i></a></li>
                      <?php } ?>
                    </ul>
                    <div class="top-scroll">
                        <a href="#top"><i class="fa fa-circle-arrow-up scroll fa-4x"></i></a>
                    </div>
                    <?php if( get_option('custom_footer_options_copyright_text')==''  ) { ?>
                    	<p>Copyright &copy; 2014 Queen Creek High School Booster Club. All Rights Reserved.</p>
                    <?php } else { ?>
                    	<p><?php echo get_option('custom_footer_options_copyright_text'); ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <?php wp_footer(); ?>
	<?php if( !get_option('custom_footer_options_google_analytics_code')=='' ) {
		echo get_option('custom_footer_options_google_analytics_code');
	} ?>
</body>

</html>
