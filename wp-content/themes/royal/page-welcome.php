<?php 
/*Template Name: Homepage*/
get_header();
?>
<style type="text/css">
.header {
	background: url('<?php echo get_option('custom_options_main_background_image'); ?>') no-repeat fixed center center / cover  rgba(0, 0, 0, 0);
}
</style>	
	
    <!-- Full Page Image Header Area -->
   
    <div id="top" class="header">
    	<div class="overlay"></div>
    
    	
   		<div class="wrapper">
   		<div class="container">
   			<div class="row">
   				
   				<section class="featuredArticle col-lg-offset-1 col-lg-4 col-md-4 col-md-offset-1 col-xs-6">
   					<?php query_posts( array( 'category_name' => 'featured', 'posts_per_page' => 1 ) );  ?>
   					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   					<article>
   						<div class="featuredHeadline clearfix">
   							<h2><span><?php the_title(); ?></span></h2>
   						</div>
   						<a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More <i class="icon-right fa  fa-chevron-right"></i><i class="fa  fa-chevron-right"></i></a>
          	</article>
          	<?php endwhile; endif; ?>
          	<?php wp_reset_query(); ?>
          </section>
          
          <section class="secondaryfeaturedArticle pull-right col-lg-4 col-md-4 col-xs-6">
   					<article>
   						<div class="featuredHeadline clearfix">
   							<h2><span>It's Our Year</span></h2>
   						</div>
   						<a class="btn btn-primary clearfix" href="<?php echo home_url(); ?>/#season">Check out the Schedule <i class="icon-right fa  fa-chevron-right"></i><i class="fa  fa-chevron-right"></i></a>
   						<a class="btn btn-primary clearfix" href="<?php echo home_url(); ?>/#roster">View the Players <i class="icon-right fa  fa-chevron-right"></i><i class="fa  fa-chevron-right"></i></a>
          	</article>
          </section>
        
        
        </div><!-- /.row -->
    	</div><!-- /.container -->
    	</div><!-- end of wrapper -->
    	<div class="clearfix"></div>
    	<?php if( (!get_option('championship_options_first_championship_year')=='') && (!get_option('championship_options_second_championship_year')=='') && (!get_option('championship_options_third_championship_year')=='') ) : ?>
    	<div id="championships" class="clearfix">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-4 col-md-4 col-sm-4">
    					<span class="date"><em>20</em><?php echo get_option('championship_options_first_championship_year'); ?></span>
    					<span class="trophy vert-text"><?php echo get_option('championship_options_first_championship_description');?></span>
    				</div>
    				<div class="col-lg-4 col-md-4 col-sm-4">
    					<span class="date"><em>20</em><?php echo get_option('championship_options_second_championship_year'); ?></span>
    					<span class="trophy vert-text"><?php echo get_option('championship_options_second_championship_description');?></span>
    				</div>
    				<div class="col-lg-4 col-md-4 col-sm-4">
    					<span class="date"><em>20</em><?php echo get_option('championship_options_third_championship_year'); ?></span>
    					<span class="trophy vert-text"><?php echo get_option('championship_options_third_championship_description');?></span>
    				</div>
    			</div>
    		</div>
    	</div><!-- /#championships -->
    	<?php endif; ?>
    </div><!-- /#top -->
    	<!-- /Full Page Image Header Area -->
<div class="clearfix"></div>
    <!-- Quote -->
    <div id="about" class="quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-md-offset-2 col-lg-offset-2 text-center">
                <?php if ( get_option('custom_options_first_quote_after_homepage_image')=='' ) { ?>
                    <h1 class="pull-left shadowMajor">"PRIDE ... HONOR ... </h1>
                    <h1 class="pull-right shadowMajor">COMMITMENT</h1>
                <?php } else { ?>
                	<h1 class="shadowMajor"><?php echo get_option('custom_options_first_quote_after_homepage_image');?></h1>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /Intro -->

    <!-- Services -->
    <div id="season" class="section">
        <div class="container">
            <div class="row">
            	<h2 class="shadowMinor">2014 Varsity Season Schedule</h2>
            </div>
            <div class="row">
                <?php echo do_shortcode('[mstw_gs_table sched="2014-varsity"]'); ?>
            </div>
        </div>
    </div>
    <!-- /Services -->

    <!-- Callout  Quote-->
    <div class="quote">
        <div class="container">
        	<div class="row">
        		<div class="col-lg-8 col-md-8 col-xs-12 col-md-offset-2 col-lg-offset-2 text-center">
        			<?php if ( get_option('custom_options_second_quote')=='' ) { ?>
        				<h1 class="shadowMajor">Bulldog Strong</h1>
        			<?php } else { ?>
        				<h1 class="shadowMajor"><?php echo get_option('custom_options_second_quote'); ?></h1>
        			<?php } ?>
        		</div>
        	</div>
        </div>
    </div>
    <!-- /Callout -->

    <!-- roster -->
    <div id="roster" class="section">
        <div class="container">
            <div class="row">
                <h2 class="shadowMinor">2014 Varsity Team Roster</h2>
            </div>
            <div class="row">
            	<?php echo do_shortcode('[mstw-tr-roster team="varsity" roster_type="custom" show_title="0" number_label="#"]'); ?>
            </div>
        </div><!-- /.container -->
    </div>
    <!-- /roster -->



<?php
get_footer(); 
?>