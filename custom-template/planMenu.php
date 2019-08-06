<?php
/**

  Template Name: Plan Menu
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package restaurant
 */
get_header();
//print("<pre>");
$categoriesList = get_categories(array(
    'hide_empty' => 0,
    'orderby' => 'name',
        ));
// print_r($categoriesList);
// print("</pre>");
// echo do_shortcode( '[contact-form-7 id="47" title="Contact form 1"]' );
?>

<div class="container">
    <div class="row" id="step1" >
        <div class="span8 offset2">
            <div class="text-center">
                <h2>Please fill up the form </h2>
            </div>
            <form action="#" method="post" role="form" class="contactForm">
                <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> -->
                <div id="errormessage"></div>
                <div class="row">
                    <div class="span4 form-group clearfix">
                        <p>Name: <span>*</span></p>	
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validation"></div>
                    </div>
                    <div class="span4 form-group clearfix">
                        <p>Email: <span>*</span></p>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validation"></div>
                    </div>
                    <div class="span4 form-group clearfix">
                        <p>Contact No: <span>*</span></p>
                        <input type="text" class="form-control" name="contactNo" id="contactNo" placeholder="contact Number" data-rule="minlen:10" data-msg="Please enter at least 10 chars of "/>
                        <div class="validation"></div>
                    </div>
                    <div class="span4 form-group clearfix">
                        <p>Location: <span>*</span></p>
                        <select name="location" >
                            <option value="Mumbai">Mumbai</option>
                            <option value="Outside Mumbai">Outside Mumbai</option>
                        </select>
                        <div class="validation"></div>
                    </div>
                    <div class="span4 form-group clearfix">
                        <p>Venue : <span>*</span></p>
                        <input type="text" class="form-control" name="venue" id="venue" placeholder="Venue" data-rule="required:true" data-msg="" >
                        <div class="validation"></div>
                    </div> 
                    <div class="span4 form-group clearfix">
                        <p>Date : <span>*</span></p>
                        <input type="date" name="doe" value="" min="<?php echo date('Y-m-d');?>" class="valid ">
                        <div class="validation"></div>
                    </div> 
                    <div class="span4 form-group clearfix">
                        <p>Event: <span>*</span></p>
                        <input type="text" class="form-control" name="event" id="event" placeholder="Event Type" data-msg="required" data-rule="required:true" >
                        <div class="validation"></div>
                    </div>
                    <div class="span4 form-group clearfix">
                        <p>No of Pax: <span> * [ Minimum 300 ]</span></p>
                        <input type="text" class="form-control" name="noofpeople" id="noofpeople" placeholder="No of People" data-rule="minval:300" data-msg="Please enter at least 300 chars">
                        <div class="validation"></div>
                    </div>
                    <div class="span12 margintop10 form-group">
                        <p class="text-center">
                            <button class="btn btn-large btn-theme margintop10" type="submit">Submit</button>
                        </p>
                    </div>	
                </div>
            </form>
        </div>
    </div>
    <div class="row" id="step2" hidden>
        <form name="mark_delicacies" id="mark_delicacies" action="#" method="POST">
            <?php foreach ($categoriesList as $category) { ?>
                <div class="span6 clearfix">
                    <!-- start: Accordion -->
                    <div class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed " data-toggle="collapse" href="#cat-<?php echo $category->term_id; ?>">
                                    <i class="icon-plus"></i><?php echo $category->name; ?></a>
                            </div>
                            <div id="cat-<?php echo $category->term_id; ?>" class="accordion-body  collapse" style="height: 0;">
                                <div class="accordion-inner">
                                    <ul class="item-list centered">
                                        <?php
                                        $args = array(
                                            'post_type' => 'post',
                                            'category' => $category->term_id
                                        );
                                        $post_lists = get_posts($args);
                                        ?>
                                        <?php foreach ($post_lists as $single_post) { ?>
                                            <li>
                                                <input type="checkbox" name="items[]" value="<?php echo $single_post->ID; ?>" id="items-<?php echo $single_post->ID . '-' . $category->term_id; ?>" data-label="<?php echo $single_post->post_title; ?>" class="styled-checkbox">
                                                <label for="items-<?php echo $single_post->ID . '-' . $category->term_id; ?>" class="" data-for="items-<?php echo $single_post->ID; ?>">
                                                    <?php echo $single_post->post_title; ?>
                                                </label>
                                                <a href="<?php echo get_template_directory_uri() . '/' ?>img/slides/nivo/bg-1.jpg" class="item-zoom" title="<?php echo $single_post->post_title; ?>">
                                                    <i class="icon-search zoom-icn"></i>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Accordion -->
                </div>
            <?php } ?>
            <div class="span12 text-center">
            <input type="button" id="submitForm" name="submit" placeholder="Search Food Item" value="Search" />            
            </div>

        </form>
    </div>
</div>
<?php
//get_sidebar();
get_footer();
?>
<script>


    // Variables
    var contact_dtls;
    var menu_list;
    var page_state = false;

    // $(function(){

    // $('select[name="location"]').change(function(){
    // if($(this).val() == 'Outside Mumbai')
    // $('.nop').find('input').attr('data-minval', '1000').end().find('span.minpax').html('1000');
    // else
    // $('.nop').find('input').attr('data-minval', '300').end().find('span.minpax').html('300');
    // });

    // });

    // function submit_step(id)
    // {
    //     if (!validate(id))
    //         return false;

    //     contact_dtls = $("#" + id).serialize();
    //     var planner_type = $('select[name="food_type"]').val();
    //     //alert(planner_type);

    //     $.post('plan-menu-2-ax.php',
    //             {
    //                 planner_type: planner_type,
    //                 ax: '1'
    //             }).done(function (data) {
    //         if (data != "ERROR!")
    //         {
    //             $('.menu-block').replaceWith(data);
    //             post_ajax();
    //         } else
    //             alert("Error!");
    //     }).fail(function () {
    //         alert("Error!");
    //     });

    //     return false;
    // }

    function post_ajax()
    {
        pre_validate();
        btn_label();

        window.onbeforeunload = function () {
            if (page_state == false)
                return 'All the entered data will be lost!!!';
        };

        $('.listing ul li').click(function (e) {
            if (e.target == this) {
                if ($(this).find('input[type="checkbox"]:checked').length > 0)
                    $(this).find('input[type="checkbox"]').attr("checked", false);
                else
                    $(this).find('input[type="checkbox"]').attr("checked", true);
            }
        });

        // Accordian Script
        $('.block-head').click(function () {
            if ($(this).hasClass('active'))
                $(this).removeClass('active').next('.listing').slideToggle();
            else
            {
                $('.block-head').not($(this)).removeClass('active').next('.listing').slideUp();
                $(this).addClass('active').next('.listing').slideToggle(function () {
                    $('html, body').animate({
                        scrollTop: $(this).prev(".block-head").offset().top - ($('.header-1').outerHeight() + 14)
                    });
                });
            }
        });

        // Load Lightbox
        baguetteBox.run('.menu-listing .block');

    }



</script>