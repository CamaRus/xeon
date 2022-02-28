<?php session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => true,
]); ?>
<?php get_header(); ?>



<section id="main-slider" class="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <div class="container">
            <?php if( have_rows('slider_header', 'option') ): ?>
                <?php while( have_rows('slider_header', 'option') ): the_row(); ?>
                <div class="carousel-content">
                    <h1><?php the_sub_field('slider_header_banner'); ?></h1>
                    <p class="lead"><?php the_sub_field('slider_header_text'); ?></p>
                   <!-- <h1>Free Onepage Theme</h1> -->
                   <!-- <p class="lead">Xeon is the best free onepage responsive theme available arround the globe<br>Download it right now for free</p> -->
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php $background_image = get_field('slider_header_background', 'option');
            $background_image_url = $background_image['url'];
            $_SESSION['background_image'] = $background_image_url; ?>
            </div>
        </div><!--/.item-->
       <!-- <div class="item">
           <div class="container">
               <div class="carousel-content">
                   <h1>ShapeBootstrap.net</h1>
                   <p class="lead">Download free but 100% premium quaility twitter Bootstrap based WordPress and HTML themes <br>from shapebootstrap.net</p>
               </div>
           </div>
       </div> -->
   </div>
<a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
<a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
</section><!--/#main-slider-->
<br><br>

<section id="services">
<div class="container">
            <div class="box first">
                <div class="row">
<?php
// args
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'services',
    'orderby' => array( 
        'date' => 'ASC',),
    'meta_query'	=> array(
		//'relation'		=> 'AND',
		array(
			'key'		=> 'class',
			'value'		=> ['android', 'apple', 'windows', 'html5', 'css3', 'thumbs-up'],
		),
    ),
);

$the_query = new WP_Query( $args );

?>
<?php if( $the_query->have_posts() ): ?>
	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                        <?php 
                        $class = get_field('class');
                            switch ($class) {
                                case "apple":
                                    $i_class = "icon-apple icon-md icon-color1";
                                    break;
                                case "android":
                                    $i_class = "icon-android icon-md icon-color2";
                                    break;
                                case "windows":
                                    $i_class = "icon-windows icon-md icon-color3";
                                    break;
                                case "html5":
                                    $i_class = "icon-html5 icon-md icon-color4";
                                    break;
                                case "css3":
                                    $i_class = "icon-css3 icon-md icon-color5";
                                    break;
                                case "thumbs-up":
                                    $i_class = "icon-thumbs-up icon-md icon-color6";
                                    break;
                                }; ?>
                            <i class="<?php echo $i_class ?>"></i>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
	<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->

<section id="portfolio">
    <div class="container">
        <div class="box">
        <?php
// args
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'portfolio',
    'meta_query'	=> array(
		//'relation'		=> 'AND',
		array(
			'key'		=> 'add_button',
			'value'		=> [],
		),
    ),
);

$the_query = new WP_Query( $args );

//var_dump(print_r($the_query));

?>
<?php if( $the_query->have_posts() ): ?>
	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="center gap">
                <h2><?php the_title(); ?></h2>
                <p class="lead"><?php echo get_the_content(); ?></p> 
            </div><!--/.center-->
            <?php if(get_field('add_button')): ?>
                <ul class="portfolio-filter">
                <?php while(has_sub_field('add_button')): 
                    $button_text = get_sub_field('button_text');
                    $button_color = get_sub_field('button_color');
                    $button_filter = '.' . get_sub_field('button_filter');
                    if($button_filter == '.без фильтра'){
                        $button_filter = '*';
                    };
                ?>
                    <li><a class="btn btn-primary active" href="#" data-filter="<?php echo $button_filter ?>" style="background-color: <?php echo $button_color ?>;"><?php echo $button_text ?></a></li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>



            <?php if(get_field('add_picture')): ?>
                <ul class="portfolio-items col-4">
                <?php while(has_sub_field('add_picture')): 
                    $image = get_sub_field('picture');
                    $image_text = get_sub_field('picture_text');
                    $image_title = get_sub_field('picture_title');
                ?>
                <li class="portfolio-item">
                    <div class="item-inner">
                        <div class="portfolio-image">
                            <img src="<?php echo $image['url']; ?>" width ="370" height="250" alt="<?php echo $image_title; ?>">
                            <div class="overlay">
                                <a class="preview btn btn-danger" title="<?php echo $image_title; ?>" href="<?php echo $image['url']; ?>"><i class="icon-eye-open"></i></a>
                            </div>
                        </div>
                        <h5><?php echo $image_text; ?></h5>
                    </div>
                </li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>


            <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
            
            </ul>
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#portfolio-->

<section id="pricing">
    <div class="container">
        <div class="box">
        <?php
        // args
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'prices',
            'meta_query'	=> array(
                //'relation'		=> 'AND',
                array(
                    'key'		=> 'prices',
                    'value'		=> [],
                ),
            ),
        );

        $the_query = new WP_Query( $args );

        //var_dump(print_r($the_query));

        ?>
        <?php if( $the_query->have_posts() ): ?>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="center">
                    <h2><?php the_title() ?></h2>
                    <p class="lead"><?php echo get_the_content() ?></p>
                </div><!--/.center-->
                <div class="big-gap"></div>
                <div id="pricing-table" class="row">
                <?php 
                $pricing = get_field('prices');

                if( have_rows('prices') ):
                    while( have_rows('prices') ) : the_row();

                        // Get parent value.
                        $parent_title = get_sub_field('price_block');
                        /* echo '<pre>';
                        print_r($parent_title);
                        echo '</pre>'; */
                ?>
                        <div class="col-sm-4">
                            <ul class="plan">
                                <li class="plan-name"><?php echo $parent_title['price_title']; ?></li>
                                <?php if($parent_title['selection_color']){
                                    $color = $parent_title['selection_color'];?>
                                    <li class="plan-price" style="background-color: <?php echo $color ?>"><?php echo $parent_title['price']; ?></li>
                                <?php } else {
                                    ?>
                                    <li class="plan-price"><?php echo $parent_title['price']; ?></li>
                                    
                                <?php };
                                    
                                ?>
                                
                                <?php 
                                if( have_rows('price_block') ):
                                    while( have_rows('price_block') ) : the_row();

                                        // Get sub value.
                                        $child_title = get_sub_field('service_list');
                                        ?> 

                                        <?php if( have_rows('service_list') ):
                                            while( have_rows('service_list') ) : the_row();

                                                $child_title_2 = get_sub_field('service');
                                        ?>
                                                <li><?php echo $child_title_2; ?></li>

                                            <?php 
                                            endwhile;
                                            endif; ?>
                                        <li class="plan-action"><a href="#" class="btn btn-primary btn-lg" style="background-color: <?php echo $parent_title['price_button_color']; ?>"><?php echo $parent_title['price_button_text']; ?></a></li>
                            <?php endwhile;
                                endif; ?>
                            </ul>
                        </div>
                    <?php endwhile;
                endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
        </div>
    </div>
</section><!--/#pricing-->

<section id="about-us">
    <div class="container">
        <div class="box">
        <?php
        // args
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'about_us',
            'meta_query'	=> array(
                'relation'		=> 'AND',
                array(
                    'key'		=> 'workers',
                    'value'		=> [],
                ),
                array(
                    'key'		=> 'slider_count',
                    'value'		=> [],
                ),
            ),
        );

        $the_query = new WP_Query( $args );

        //var_dump(print_r($the_query));
        //print_r($args);

        ?>
        <?php if( $the_query->have_posts() ): ?>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="center">
                <h2><?php echo the_title() ?></h2>
                <p class="lead"><?php echo get_the_content() ?></p>
                <p><?php
                        $_SESSION['slider_count'] = get_field('slider_count');
                ?></p>
            </div>
            <div class="gap"></div>
            <div id="team-scroller" class="carousel scale">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                        <?php if(get_field('workers')): ?>
                            <?php while(has_sub_field('workers')):
                                $worker_photo = get_sub_field('worker_photo');
                                $worker_data = get_sub_field('worker_data');
                                $worker_function = get_sub_field('worker_function'); ?>
                            <div class="col-sm-4">
                                <div class="member">
                                    <p><img class="img-responsive img-thumbnail img-circle" src="<?php echo $worker_photo['url']; ?>" alt="<?php echo $worker_photo['alt']; ?>" ></p>
                                    <h3><?php echo $worker_data; ?><small class="designation"><?php echo $worker_function; ?></small></h3>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
                <a class="left-arrow" href="#team-scroller" data-slide="prev">
                    <i class="icon-angle-left icon-4x"></i>
                </a>
                <a class="right-arrow" href="#team-scroller" data-slide="next">
                    <i class="icon-angle-right icon-4x"></i>
                </a>
            </div><!--/.carousel-->
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
        </div><!--/.box-->
    </div><!--/.container-->


</section><!--/#about-us-->





<section id="contact">
    <div class="container">
        <div class="box last">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Contact Form</h1>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    <div class="status alert alert-success" style="display: none"></div>
                    <?php echo do_shortcode( '[contact-form-7 id="145" title="Contact Form"]' ); ?>
                </div><!--/.col-sm-6-->
                <div class="col-sm-6">
                    <h1>Our Address</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                    </div>
                    <h1>Connect with us</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="social">
                                <li><a href="#"><i class="icon-facebook icon-social"></i> Facebook</a></li>
                                <li><a href="#"><i class="icon-google-plus icon-social"></i> Google Plus</a></li>
                                <li><a href="#"><i class="icon-pinterest icon-social"></i> Pinterest</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="social">
                                <li><a href="#"><i class="icon-linkedin icon-social"></i> Linkedin</a></li>
                                <li><a href="#"><i class="icon-twitter icon-social"></i> Twitter</a></li>


<?php get_footer() ?>