<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package restaurant
 */

?>
  <section id="featured">
      <!-- start slider -->
      <!-- Slider -->
      <div id="nivo-slider">
        <div class="nivo-slider">
          <!-- Slide #1 image -->
          <img src="<?php echo get_template_directory_uri().'/' ?>img/slides/nivo/bg-1.jpg" alt="" title="#caption-1" />
          <!-- Slide #2 image -->
          <img src="<?php echo get_template_directory_uri().'/' ?>img/slides/nivo/bg-2.jpg" alt="" title="#caption-2" />
          <!-- Slide #3 image -->
          <img src="<?php echo get_template_directory_uri().'/' ?>img/slides/nivo/bg-3.jpg" alt="" title="#caption-3" />
        </div>
        <div class="container">
          <div class="row">
            <div class="span12">
              <!-- Slide #1 caption -->
              <div class="nivo-caption" id="caption-1">
                <div>
                  <h2>Awesome <strong>features</strong></h2>
                  <p>
                    Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                  </p>
                  <a href="#" class="btn btn-theme">Read More</a>
                </div>
              </div>
              <!-- Slide #2 caption -->
              <div class="nivo-caption" id="caption-2">
                <div>
                  <h2>Fully <strong>responsive</strong></h2>
                  <p>
                    Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                  </p>
                  <a href="#" class="btn btn-theme">Read More</a>
                </div>
              </div>
              <!-- Slide #3 caption -->
              <div class="nivo-caption" id="caption-3">
                <div>
                  <h2>Very <strong>customizable</strong></h2>
                  <p>
                    Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                  </p>
                  <a href="#" class="btn btn-theme">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slider -->
    </section>
  <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span3">
			   <a href="<?php echo get_site_url(); ?>/select-page">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <i class="icon-briefcase icon-circled icon-64 active"></i>
                  </div>
                  <div class="text">
                    <h6>Go to Menu</h6>
                    <p>
                      Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                    </p>
                  </div>
                </div>
				</a>
              </div>
              <div class="span3">
			   <a href="<?php echo get_site_url(); ?>/select-page">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <i class="icon-desktop icon-circled icon-64 active"></i>
                  </div>
                  <div class="text">
                    <h6>Go to Menu</h6>
                    <p>
                      Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                    </p>
                  </div>
                </div>
				</a>
              </div>
              <div class="span3">
			   <a href="<?php echo get_site_url(); ?>/select-page">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <i class="icon-beaker icon-circled icon-64 active"></i>
                  </div>
                  <div class="text">
                    <h6>Go to Menu</h6>
                    <p>
                      Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                    </p>
                  </div>
                </div>
				</a>
              </div>
              <div class="span3">
			   <a href="<?php echo get_site_url(); ?>/select-page">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <i class="icon-coffee icon-circled icon-64 active"></i>
                  </div>
                  <div class="text">
                    <h6>Go to Menu</h6>
                    <p>
                      Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                    </p>
                  </div>
                </div>
				</a>
              </div>			  	
                <div class="box aligncenter">
             
              </div>
            </div>
          </div>
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <!-- Portfolio Projects -->
        <div class="row">
          <div class="span12">
            <h4 class="heading"><strong>Listing</strong></h4>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-01-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-01.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-02-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-02.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-03-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-03.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-04-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-04.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-4" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Sea" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-05-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-05.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-5" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Clouds" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-06-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-06.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-07-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-07.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Dark" href="<?php echo get_template_directory_uri().'/' ?>img/works/full/image-08-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?php echo get_template_directory_uri().'/' ?>img/works/thumbs/image-08.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Portfolio Projects -->
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <div class="row">
          <div class="span12">
            <h4><strong>Menu</strong></h4>
            <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client1.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client2.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client3.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client4.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client5.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client6.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client1.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client2.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client3.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client4.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client5.png" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="<?php echo get_template_directory_uri().'/' ?>img/dummies/clients/client6.png" class="client-logo" alt="" />
					</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  <section id="bottom">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="aligncenter">
              <div id="twitter-wrapper">
                <div id="twitter">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 