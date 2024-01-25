<?php



/*



Template Name: O společnosti



*/



?>



<?php get_header(); ?>

<?php $id = get_the_ID(); ?>

<main id="up">
    
    <section class="headline headline-sub">
        
        <div class="container">
            
            <div class="headline-content">
                
                <strong class="title">
                    <?php echo get_the_title(); ?>
                </strong>
                
            </div>
            
        </div>
        
    </section>
    
    <section class="about-head">
        
        <div class="container">
            
            <?php if (get_post_meta($id, 'abouttitle', true) && strlen(get_post_meta($id, 'abouttitle', true)) > 1): ?>         
                <h2>
                    <?php echo get_post_meta($id, 'abouttitle', true); ?>
                </h2>
            <?php endif; ?>
            
            <?php if (get_post_meta($id, 'abouttext', true) && strlen(get_post_meta($id, 'abouttext', true)) > 1): ?>         
                <p>
                    <?php echo nl2br(get_post_meta($id, 'abouttext', true)); ?>
                </p>
            <?php endif; ?>          
            
        </div>
        
    </section>
    
    <section class="people">
        
        <div class="container">
            
            <h2>
                Náš tým
            </h2>
            
            <div class="people-items">
                
                <?php $team = get_post_meta($id, 'teamitems', true); ?>
                
                <?php if($team): ?>
                <?php foreach($team as $item): ?>
                    
                    <div class="item">
                        
                        <?php if(strlen($item['teamitemimage']) > 1): ?>
                            <div class="item-image">                            
                                <img src="<?php echo $item['teamitemimage']; ?>" alt="<?php echo $item["teamitemname"]; ?>" />
                            </div>
                        <?php endif; ?>

                        <div class="item-text">

                            <h3>
                                <?php echo $item["teamitemname"]; ?>
                            </h3>

                            <?php if(strlen($item["teamitempos"]) > 1): ?>
                                <strong class="position">
                                    <span><?php echo $item["teamitempos"]; ?></span>
                                </strong>
                            <?php endif; ?>

                            <p>
                                <?php echo nl2br($item["teamitemtext"]); ?>
                            </p>

                        </div>

                    </div>
                
                <?php endforeach; ?>                
                <?php endif; ?>
                
            </div>
            
        </div>
        
    </section>
    
</main>  
                            

<?php get_footer(); ?>