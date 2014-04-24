<?php 
/*Template Name: Homepage*/
get_header();
?>
	
	
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
   						<a class="btn btn-primary clearfix" href="<?php home_url(); ?>/#season">Check out the Schedule <i class="icon-right fa  fa-chevron-right"></i><i class="fa  fa-chevron-right"></i></a>
   						<a class="btn btn-primary clearfix" href="<?php home_url(); ?>/#roster">View the Players <i class="icon-right fa  fa-chevron-right"></i><i class="fa  fa-chevron-right"></i></a>
          	</article>
          </section>
        
        
        </div><!-- /.row -->
    	</div><!-- /.container -->
    	</div><!-- end of wrapper -->
    	<div class="clearfix"></div>
    	<div id="championships" class="clearfix">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-4 col-md-4 col-sm-4">
    					<span class="date"><em>20</em>13</span>
    					<span class="trophy vert-text">4th in State</span>
    				</div>
    				<div class="col-lg-4 col-md-4 col-sm-4">
    					<span class="date"><em>20</em>12</span>
    					<span class="trophy vert-text">State Champions</span>
    				</div>
    				<div class="col-lg-4 col-md-4 col-sm-4">
    					<span class="date"><em>20</em>11</span>
    					<span class="trophy vert-text">Semi Finals</span>
    				</div>
    			</div>
    		</div>
    		
    	</div><!-- /#championships -->
    </div><!-- /#top -->
    	<!-- /Full Page Image Header Area -->
<div class="clearfix"></div>
    <!-- Quote -->
    <div id="about" class="quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-md-offset-2 col-lg-offset-2 text-center">
                    <h1 class="pull-left shadowMajor">"PRIDE ... HONOR ... </h1>
                    <h1 class="pull-right shadowMajor">COMMITMENT</h1>
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

    <!-- Callout -->
    <div class="callout">
        <div class="vert-text">
            <h1 class="shadowMajor">A Dramatic Text Area</h1>
        </div>
    </div>
    <!-- /Callout -->

    <!-- Portfolio -->
    <div id="roster" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <h2>Our Work</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2 text-center">
                    <div class="portfolio-item">
                        <a href="#">
                            <img class="img-portfolio img-responsive" src="img/portfolio-1.jpg">
                        </a>
                        <h4>Cityscape</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="portfolio-item">
                        <a href="#">
                            <img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
                        </a>
                        <h4>Is That On Fire?</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2 text-center">
                    <div class="portfolio-item">
                        <a href="#">
                            <img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
                        </a>
                        <h4>Stop Sign</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="portfolio-item">
                        <a href="#">
                            <img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
                        </a>
                        <h4>Narrow Focus</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Portfolio -->

    <!-- Call to Action -->
    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-default">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-primary">Look at Me!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Call to Action -->

    <!-- Map -->
    <div id="contact" class="map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>
    </div>
    <!-- /Map -->

<?php
get_footer(); 
?>