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
            
        </div>
        
    </section>
    
</main>


<?php get_footer(); ?>