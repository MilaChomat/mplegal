/** 
 * Touch friendly slider - Swipe.js
 * @see http://swipe.js
 * @see https://github.com/bradbirdsall/Swipe
 * 
 */

/**
 * Inicializace slideru s produktama
 * Muze se volat i pro vytvoreni vice slideru na jedne strance
 * 
 * Swipe.js
 * see https://github.com/bradbirdsall/Swipe
 */
$.fn.exInitSlider = function(id, options) {       
    //prvotni inicializace objektu pro ukladani slideru (aby jich mohlo byt vic)
    if (typeof(window.swipeJsSlider) === 'undefined') window.swipeJsSlider = new Array();
    
    //swipe jen pokud je tam element se danym id
    if ($('#' + id).length > 0) {        
        var defaults = {
            speed: 800,
            auto: 5000,
            continuous: true,
            disableScroll: false,
            stopPropagation: true,
            callback: function(index, elem) {
                //zmena aktivni bullet v navigaci    
                
                elem = $(elem);
                elem.addClass("active").siblings().removeClass("active");
                var sliderNavigationPages = elem.parent().parent().siblings('ul');
                sliderNavigationPages.find('li').removeClass('active');
                sliderNavigationPages.find('li:eq( ' + index + ')')
                                     .addClass('active');
                if    (elem.parent().parent().parent().parent().prev().children().children().is('#solution-concrete-nav')) {
                    var sliderUpNav = elem.parent().parent().parent().parent().prev().children().children('#solution-concrete-nav');
                    sliderUpNav.find('li').removeClass('active');
                    sliderUpNav.find('li:eq( ' + index + ')')
                                     .addClass('active');
                }         
                
               // console.log(elem);
            },
            transitionEnd: function(index, elem) {
            }
        }
        
        //zjisteni startSlide
        var startSlide = $('#' + id).data('slider-start-slide');
        startSlide = (typeof(startSlide) === 'undefined' ? 0 : startSlide);
        defaults.startSlide = startSlide;
        
        //override defaults
        if (typeof(options) === 'undefined') options = {};
        var settings = $.extend({}, defaults, options);    
        
        //vytvoreni slideru
        window.swipeJsSlider[id] = new Swipe(document.getElementById(id), settings);

        //aktivace aktualni polozky v slider navigation      
        sliderWrapper = $('#' + id).parent();
        sliderWrapper.find('.slider-navigation-pages li:eq(' + startSlide + ')').addClass('active');
        sliderWrapper.find('.slider-navigation-pages').on('click', 'li a', function(e) {
            e.preventDefault();
            var targetSlide = $(this).parent().index();   
            //kvuli .slider-navigation-pages-wrapper pridan jeden .parent()
            var sliderWrapper = $(this).parent().parent().parent();
            //musi hledat div.swipe, protoze prvni div je .overlay
            var id = sliderWrapper.find('div.swipe').attr('id');
            window.swipeJsSlider[id].slide(targetSlide, 800);
        });  
        //klik na sipku doleva
        sliderWrapper.find('.slider-navigation-left-arrow').on('click', function(e) {
            e.preventDefault();
            window.swipeJsSlider[id].prev();
        });
        //klik na sipku doprava
        sliderWrapper.find('.slider-navigation-right-arrow').on('click', function(e) {
            e.preventDefault();
            window.swipeJsSlider[id].next();
        });
        if (sliderWrapper.parent().prev().children().children().is('#solution-concrete-nav')) {            
            $('#solution-concrete-nav').children('li').on('click',function(e) {
                e.preventDefault();
                var targetSolSlide = $(this).index();
                window.swipeJsSlider[id].slide(targetSolSlide, 800);
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
            });
        }
    }
    

}

$.fn.exInitSliders = function(name, id, options) {       
    //prvotni inicializace objektu pro ukladani slideru (aby jich mohlo byt vic)
    if (typeof(window.swipeJsSlider) === 'undefined') window.swipeJsSlider = new Array();
    
    $(name).each(function(){
    //swipe jen pokud je tam element se danym id
    if ($(name).length > 0) {        
        var defaults = {
            speed: 800,
            auto: 5000,
            continuous: true,
            disableScroll: false,
            stopPropagation: true,
            callback: function(index, elem) {
                                
                
                //zmena aktivni bullet v navigaci              
                elem = $(elem);
                var sliderNavigationPages = elem.parent().next().find('ul');
                sliderNavigationPages.find('li').removeClass('active');
                sliderNavigationPages.find('li:eq( ' + index + ')')
                                     .addClass('active');
                if    (elem.parent().parent().parent().parent().prev().children().children().is('#solution-concrete-nav')) {
                    var sliderUpNav = elem.parent().parent().parent().parent().prev().children().children('#solution-concrete-nav');
                    sliderUpNav.find('li').removeClass('active');
                    sliderUpNav.find('li:eq( ' + index + ')')
                                     .addClass('active');
                }         
                
                
            },
            transitionEnd: function(index, elem) {
            }
        }
        
        //zjisteni startSlide
        var startSlide = $(name).data('slider-start-slide');
        startSlide = (typeof(startSlide) === 'undefined' ? 0 : startSlide);
        defaults.startSlide = startSlide;
        
        //override defaults
        if (typeof(options) === 'undefined') options = {};
        var settings = $.extend({}, defaults, options);    
        
        //vytvoreni slideru
        window.swipeJsSlider[id] = new Swipe(document.getElementById(id), settings);

        //aktivace aktualni polozky v slider navigation      
        sliderWrapper = $(name).parent();
        sliderWrapper.find('.slider-navigation-pages li:eq(' + startSlide + ')').addClass('active');
        sliderWrapper.find('.slider-navigation-pages').on('click', 'li a', function(e) {
            e.preventDefault();
            var targetSlide = $(this).parent().index();   
            //kvuli .slider-navigation-pages-wrapper pridan jeden .parent()
            var sliderWrapper = $(this).parent().parent().parent().parent().parent();
            //musi hledat div.swipe, protoze prvni div je .overlay
            var id = sliderWrapper.children('div.swipe').attr('id');
            window.swipeJsSlider[id].slide(targetSlide, 800);
        });  
        //klik na sipku doleva
        sliderWrapper.find('.slider-navigation-left-arrow').on('click', function(e) {
            e.preventDefault();
            window.swipeJsSlider[id].prev();
        });
        //klik na sipku doprava
        sliderWrapper.find('.slider-navigation-right-arrow').on('click', function(e) {
            e.preventDefault();
            window.swipeJsSlider[id].next();
        });
       // if (sliderWrapper.parent().prev().children().children().is('#solution-concrete-nav')) {            
            $('body').on('click', '#solution-concrete-nav li', function(e) {
                e.preventDefault();                
                var targetSliderId = $(this).parent().parent().parent().next().children().children().attr('id');
                console.log(targetSliderId);                
                var targetSolSlide = $(this).index();
                window.swipeJsSlider[targetSliderId].slide(targetSolSlide, 800);
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
            });
       // }
    }
    });

}

$(document).ready(function() {       
    //init homepage prvni slider
    $('.slider-page').each(function(){
        if(!$(this).children().length > 0){
            $(this).remove();
        }
    });
    //$.fn.exInitSlider('slider-app-image');
    $.fn.exInitSlider('strip-slider',{auto: 0});
    $.fn.exInitSlider('dealers-slider',{auto: 0});
    $.fn.exInitSlider('timeline-slider',{auto: 0, continuous: false});
   // $.fn.exInitSlider('slider-study',{auto: 0});
    //$.fn.exInitSlider('slider-solution',{auto: 0});
    
});