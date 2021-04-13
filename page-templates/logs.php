<?php
/**
* Template Name: Logs
*
*/
get_header();

$services = ['shopify','konimbo','istore','paxxi'];
?>


<div id="content-area" class="logs_page">
    <main id="main" class="site-main">
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <label>
            <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            <?php  foreach ($services as $service){?>
                <input type="hidden" name="post_type" value="<?php echo $service . '_' . 'order' ?>" />
                <input type="hidden" name="post_type"  value="<?php echo $service . '_' . 'ainvoice' ?>" />
                <input type="hidden" name="post_type"  value="<?php echo $service . '_' . 'otc' ?>" />
                <input type="hidden" name="post_type"  value="<?php echo $service . '_' . 'invoice' ?>" />
                <input type="hidden" name="post_type"  value="<?php echo $service . '_' . 'receipt' ?>" />
                <input type="hidden" name="post_type"  value="<?php echo $service . '_' . 'shipment' ?>" />
            <?php }?>
        </label>
        <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
    </form>
        <?php 
            foreach ($services as $service){
                display_custom_post_type( $service,'Order');
                display_custom_post_type($service,'ainvoice');
               // display_custom_post_type($service,'otc');
                display_custom_post_type($service,'Invoice');
                display_custom_post_type($service,'Receipt');
                display_custom_post_type($service,'Shipment');
                
            }

            function display_custom_post_type($service,$document){
                global $current_user;
                
                $args = array(
                    'post_type' => strtolower($service . '_' . $document),
                    'posts_per_page' => -1, 
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby'       =>  'post_date',
                    'author'        =>  $current_user->ID
                  );
                $current_user_posts = get_posts( $args );
                $total = count($current_user_posts);
                $query = new WP_Query($args);
                if ($query->have_posts()) :?>
                    <div class="service_item">
                        <?php echo '<h2 class="service_title">'. $service.' '.$document.'</h2>';
                         while ($query->have_posts()) : $query->the_post(); ?> 
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="item-wrapper">
                                    <div class="entry-meta">
                                        <?php
                                        simplypriorityhub_posted_on();
                                        //logs_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->
                                    <h2 class="entry-title"> <?php the_title(); ?> </h2>
                                    <span id="logs_content"><?php the_content(); ?></span>
                                    <div class="btn_container">
                                        <button id="toggle_content">Read More</button>
                                    </div>
                                </div>
        
                            </article><!-- #post-<?php the_ID(); ?> -->
                        <hr>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    ?>
                    </div>
                <?php endif; 
            }
            ?>

    </main><!-- #main -->
	</div><!-- #primary -->