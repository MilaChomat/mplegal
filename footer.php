<footer class="<?php if(is_page_template( 'template-contact.php' )): ?>footer-contact-page<?php endif; ?>">
    <div class="footer-inner <?php if(is_page_template( 'template-contact.php' )): ?>footer-inner-hidden<?php endif; ?>">
        <div class="container">

            <div class="footer-left <?php if(is_page_template( 'template-contact.php' )): ?>footer-left-contact<?php endif; ?>">
            
                <?php if(!is_page_template( 'template-contact.php' )): ?>
                    <div class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/data/images/logo.png" alt="<?php echo get_the_title(); ?>" />
                    </div>
                <?php endif; ?>
                
                <nav>
                    <?php dynamic_sidebar("main-menu"); ?>
                </nav>
                
            </div>
            
            <?php if(!is_page_template( 'template-contact.php' )): ?>

                <div class="footer-right">
                    <?php $contactId = 45; ?>
                    <ul>
                            <?php if (get_post_meta($contactId, 'phone', true) && strlen(get_post_meta($contactId, 'phone', true)) > 1): ?>  
                                <?php $phone = get_post_meta($contactId, 'phone', true); ?>
                                <li class="phone">
                                    <a href="tel:<?php echo preg_replace('/\s+/', '', $phone); ?>"><?php echo $phone; ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (get_post_meta($contactId, 'fax', true) && strlen(get_post_meta($contactId, 'fax', true)) > 1): ?>                          
                                <li class="fax">
                                    <?php echo get_post_meta($contactId, 'fax', true); ?>
                                </li>
                            <?php endif; ?>

                            <?php if (get_post_meta($contactId, 'email', true) && strlen(get_post_meta($contactId, 'email', true)) > 1): ?>       
                                <?php $email = get_post_meta($contactId, 'email', true); ?>
                                <li class="email">
                                    <a href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (get_post_meta($contactId, 'address', true) && strlen(get_post_meta($contactId, 'address', true)) > 1): ?>                               
                                <li class="place">
                                    <?php echo nl2br(get_post_meta($contactId, 'address', true)); ?>
                                </li>
                            <?php endif; ?>

                    </ul>
                </div>         
            
            <?php endif; ?>

        </div>
    </div>
    <div class="container container-footer">
        <a href="#up" class="up"></a>
        <div class="copyright">
            <?php  dynamic_sidebar("footer-copyright"); ?>
        </div>
    </div>
</footer>

<div class="lightbox-wrapper">
    
    <div class="lightbox-content">
        
        <a href="" class="lightbox-close"></a>
        
        <div class="lightbox-content-inner">
            
        </div>
        
    </div>
    
</div>

<?php wp_footer(); ?>

</body>

</html>