<?php

/*



  Template Name: Domovská stránka



 */
?>



<?php get_header(); ?>

<?php $id = get_the_ID(); ?>


<main id="up">
    
    <section class="headline">
        
        <div class="container">
            
            <div class="headline-content">
                
                <strong class="title">
                    <?php if (get_post_meta($id, 'hpheadlinetitle', true) && strlen(get_post_meta($id, 'hpheadlinetitle', true)) > 1): ?>   
                        <?php echo get_post_meta($id, 'hpheadlinetitle', true); ?>
                    <?php else: ?>                        
                        <?php echo get_the_title(); ?>
                    <?php endif; ?>
                </strong>
                
                <?php if (get_post_meta($id, 'hpheadlinetext', true) && strlen(get_post_meta($id, 'hpheadlinetext', true)) > 1): ?>   
                    <p>
                        <?php echo nl2br(get_post_meta($id, 'hpheadlinetext', true)); ?>
                    </p>
                <?php endif; ?>
                
                <a href="#info" class="down">
                    
                </a>
                
            </div>
            
        </div>
        
    </section>
    
    <section id="info" class="info">
        
        <div class="container">
            
            <?php if (get_post_meta($id, 'hpmainleft', true) && strlen(get_post_meta($id, 'hpmainleft', true)) > 1): ?>   
                
                <div class="info-left">
                    <h2 class="inner">
                        <?php echo nl2br(get_post_meta($id, 'hpmainleft', true)); ?>
                    </h2>
                </div>
            
            <?php endif; ?>
                            

            <div class="info-right">
                
                <?php if (get_post_meta($id, 'hpmainright', true) && strlen(get_post_meta($id, 'hpmainright', true)) > 1): ?>  
                    <p>
                        <?php echo nl2br(get_post_meta($id, 'hpmainright', true)); ?>
                    </p>
                <?php endif; ?>
                    
                <?php if (get_post_meta($id, 'hpmainlinktext', true) && strlen(get_post_meta($id, 'hpmainlinktext', true)) > 1): ?>  
                    <?php if (get_post_meta($id, 'hpmainlink', true) && strlen(get_post_meta($id, 'hpmainlink', true)) > 1): ?>  
                        <a class='button' href='<?php echo get_post_meta($id, 'hpmainlink', true); ?>'><?php echo get_post_meta($id, 'hpmainlinktext', true); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                    
            </div>
            
        </div>
        
    </section>
    
    <section class="news">
        
        <div class="container">
            
            <h2>
                Novinky
            </h2>
            
            <?php
            $blog_query = new WP_Query(array('post_status' => 'publish', 'orderby' => 'ID', 'posts_per_page' => '-1'));
            ?>


            <?php if ($blog_query->have_posts()): ?>
                
                <?php $it = 0; ?>
                
                <?php $count = count($blog_query); ?>
                
                <?php while ($blog_query->have_posts()): ?>
                            
                    <?php
                    $blog_query->the_post();
                    ?>
                    
                    <div class="box">

                                <a href="">
                                    <div class="inner">
                                        <span class="title">
                                    <?php echo get_the_title(); ?>
                                        </span>
                                        <p>
                                    <?php echo get_the_excerpt(); ?>
                                        </p>
                                        <div class="bottom">
                                            <time><?php echo get_post_time('j. n. Y', true); ?></time>
                                            <span class="arrow"></span>
                                        </div>
                                    </div>
                                </a>   
                                <div class="article">
                                    <article>
                                        <h2>
                                            <?php echo get_the_title(); ?>
                                        </h2>
                                
                                        <?php
                                            $post = get_post(get_the_ID());
                                            $content = apply_filters('the_content', $post->post_content);
                                            echo $content;
                                        ?>
                                    </article>
                                </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
                  
            
            <a href="" class="button-more" data-no-more="Další novinky nejsou k dispozici">
                Načíst další
            </a>
            
        </div>
        
    </section>
    
</main>


<?php get_footer(); ?>