<?php
/**

Template Name: Planner Or Browse
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package restaurant
 */

get_header();
?>

 <section id="content">
      <div class="container">
        <div class="row">

          <div class="span8 offset2">
		  
		  <div class="text-center">
		  <h2>Food Menu Options</h2>
			 <p>
			Here is the list of all the mouth watering delicacies we offer. Browse our complete range of menu being segregated into various types, 
	<br/>OR<br/>
Use our Menu Planner to plan it for your special occasion and send it to us in no time. We make it easy for you and its on the go.
			</p>
			</div>
            <div class="row">
              <div class="span4">
                <div class="box aligncenter">
				<a href="<?php echo get_site_url(); ?>/plan-menu">
                  <div class="aligncenter icon menuImag">
					<img src="<?php echo get_template_directory_uri() . '/' ?>img/menu.png">
                  </div>
				  </a>
                  <div class="text">
                    <h5>Browse Menu</h5>
                  </div>
                </div>
              </div>
              <div class="span4">
                <div class="box aligncenter">
				<a href="<?php echo get_site_url(); ?>/plan-menu">
                  <div class="aligncenter icon menuImag">
					<img src="<?php echo get_template_directory_uri() . '/' ?>img/menu.png">
                  </div>				  </a>
                  <div class="text">
                    <h5>Menu Planner</h5>
                  </div>
                </div>
              </div>
			</div>
          </div>
        </div>
        <!-- divider -->
      </div>
	  
   </section>
<?php 
//get_sidebar();
get_footer();
