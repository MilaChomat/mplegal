<?php



/*



Template Name: Služby



*/



?>



<?php get_header(); ?>

<?php $id = get_the_ID(); ?>

<?php 
    global $post;
    $slug = $post->post_name;
?>

<main id="up">
    
    <section class="headline headline-sub">
        
        <div class="container">
            
            <div class="headline-content">
                
                <strong class="title">
                    Právní služby
                </strong>
                
            </div>
            
        </div>
        
    </section>
    
    <section class="services">
        
        <div class="container">
            
            <div class="services-sidebar">
                <ul>
                    <?php
                    
                    $pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'template-services.php',
                        'sort_column' => 'post_date',
                    ));
                    foreach ($pages as $page): ?>                     
                        <li class="<?php if($slug == $page->post_name): ?>current-menu-item<?php endif; ?>">                            
                            <a href="<?php echo $page->post_name; ?>">
                                <?php echo $page->post_title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    
                </ul>
            </div>
            
            <div class="services-content">
                
                <article>
                    
                    <?php                
                        $post = get_post($id);
                        $content = apply_filters('the_content', $post->post_content);
                        echo $content;
                    ?>
                    
                </article>
                
            </div>
            
        </div>
        
    </section>
    
</main>
                
<?php get_footer(); ?>