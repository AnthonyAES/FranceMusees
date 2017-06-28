$(document).ready(function(){ 
    $(window).scroll(function(){
        
        
        if ($(this).scrollTop() > 400) { 
            $('.scroll-button').fadeIn(); 
        } else { 
            $('.scroll-button').fadeOut(); 
        }
        
       
    });
    
    
    
    $('.scroll-button').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    });
});