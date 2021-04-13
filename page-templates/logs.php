<?php
/**
* Template Name: Logs
*
*/
get_header();

$services = ['shopify','konimbo','istore','paxxi'];
?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php 
            foreach ($services as $service){
                display_custom_post_type( $service,'Order');
                display_custom_post_type($service,'ainvoice');
                display_custom_post_type($service,'otc');
                display_custom_post_type($service,'Invoice');
                display_custom_post_type($service,'Receipt');
                display_custom_post_type($service,'Shipment');
                
            }

            function display_custom_post_type($service,$document){
                global $current_user;
                echo '<h2 style="color:red">'. $service.'_'.$document.'</h2>';
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
                echo 'number of posts: '.$total;
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?> 
                        <div class="">
                            <h2 style="text-align: center; font-weight: 700!important;"><?php the_title(); ?></h2>
                            <p  style="text-align: justify;">
                                <?php
                                echo wp_trim_words(get_the_content(),30);
                                ?>
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </p>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <!-- show pagination here -->
                <?php else : ?>
                    <!-- show 404 error here -->
                <?php endif; 

            }
            ?>

    </main><!-- #main -->
	</div><!-- #primary -->