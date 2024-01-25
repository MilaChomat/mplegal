jQuery(document).ready(function ($) {
    
    $.fn.adjustListItemSize = function () {
        function getMaxListItemHeight(elements) {
            var maxHeight = 0;
            elements.each(function () {
                var height = $(this).css('height', 'auto').height();
                maxHeight = (height > maxHeight ? height : maxHeight);
            });
            return maxHeight;
        }

        var maxTextHeight = getMaxListItemHeight($(this));
        $(this).height(maxTextHeight);

        var windowWidth = $(window).width();
        if (windowWidth > 767) {
            var maxTextHeight = getMaxListItemHeight($(this));
            $(this).height(maxTextHeight);
        } else {
            $(this).css('height', 'auto');
        }
    };
    
    $('.news-boxes:first-of-type .title').adjustListItemSize();  
    
    $('.news-boxes:first-of-type .inner > p').adjustListItemSize();  
    
    $(window).load(function(){
        
        $('.news-boxes:first-of-type .title').adjustListItemSize();
        
        $('.news-boxes:first-of-type .inner > p').adjustListItemSize();  
        
    });
    
    if($(".services-menu-item").length > 0 && $("section.services").length > 0) {
        if(!$(".services-menu-item").hasClass("current-menu-item")) {
            $(".services-menu-item").addClass("current-menu-item");
        }
    }
    
    //$('.news-boxes:first-of-type .inner').adjustListItemSize();     
    
    
    $(document).on("click", "a", function(e){        
        if($(this).attr("href").length > 0) {
            var item = $(($(this).attr("href").replace("/", '')));
            if(item.length > 0) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: item.offset().top
                }, 1000);
            }
        }
    });            
    
    $(document).on("click", ".button-more", function(e){
        e.preventDefault();
        if($(".news-boxes").length > 0) {
           if($(".news-boxes:visible:last").next("div").length > 0) {
               
               var el = $(".news-boxes:visible:last");
               
               el.next("div").removeClass("invisible");    
               
               var time = 0;
               el.next("div").find(".box").each(function(){
                   time = time+400;
                   var target = $(this);
                    setTimeout(function(){
                        target.addClass("visible");
                    },time); 
               });                              
               
               $('.news-boxes:visible:last .title').adjustListItemSize();  
    
                $('.news-boxes:visible:last .inner > p').adjustListItemSize(); 
               
               if(!$(".news-boxes:visible:last").next("div").length > 0) {
                   $(this).html($(this).data("no-more"));
                    $(this).addClass("no-more");
               }
           } else {
               $(this).html($(this).data("no-more"));
               $(this).addClass("no-more");
           }
        }
    });
    
    $(document).on("click", ".box a", function(e){
        e.preventDefault();
        
        var content = $(this).next(".article").html();
        
        if($(".lightbox-wrapper").length > 0) {                        
            
            $(".lightbox-wrapper").fadeIn();
            $("body").toggleClass("fixed");
            $(".lightbox-content-inner").html(content);
            
            $(".lightbox-wrapper").animate({
                scrollTop: 0
            }, 500);
        }
    });
    
    $(document).on("click", ".lightbox-close", function(e){
        e.preventDefault();                        
        if($(".lightbox-wrapper").length > 0) {
            $(".lightbox-wrapper").fadeOut();
            $("body").toggleClass("fixed");
            setTimeout(function(){
                $(".lightbox-content-inner").html("");
            },600);            
        }
    });
    
    $(document).on("click", ".lightbox-wrapper", function(e){
        e.preventDefault();                   
        if(!$(".lightbox-content").is(":hover")) {
            if($(".lightbox-wrapper").length > 0) {
                $(".lightbox-wrapper").fadeOut();
                $("body").toggleClass("fixed");
                setTimeout(function(){
                    $(".lightbox-content-inner").html("");
                },600);            
            }
        }
    });

    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            e.preventDefault();
            if ($(".lightbox-wrapper").length > 0) {
                if($(".lightbox-wrapper").is(":visible")) {
                    $(".lightbox-wrapper").fadeOut();
                    $("body").toggleClass("fixed");                    
                    setTimeout(function () {
                        $(".lightbox-content-inner").html("");
                    }, 600);  
                }
            }
        }
    });

    $("article").find("img").each(function(){
        
        $(this).wrap("<div class='img-wrap'></div>");
        
        if($(this).attr("sizes")) {
            $(this).attr("sizes","");
        }
        
    });
    
    var divs = $(".news .box");
    for (var i = 0; i < divs.length; i += 3) {
        divs.slice(i, i + 3).wrapAll("<div class='news-boxes'></div>");
    }
    
    $(".news-boxes").each(function(){
        if(!$(this).is(":first-of-type")) {
            $(this).addClass("invisible");
        }
    });
    
    $(window).resize(function () {
        
        $('.news-boxes:first-of-type .title').adjustListItemSize();
        
        $('.news-boxes:first-of-type .inner > p').adjustListItemSize();  
        
        if($("#map").length > 0) {
            google.maps.event.trigger(map, "resize");
        }
    });
    
});