/**
 *@file
 *not used
 **/
(function ($, Drupal, window, document, undefined) {

$(function(){
    if($('ul.bef-tree li').children('ul.bef-tree-child')){
        $('ul.bef-tree li').children('ul.bef-tree-child').parent().addClass('collapse_filter');
        $('.collapse_filter').find('label').addClass("passive");
        $('.collapse_filter').find('input').click(function(){
            $(this).parent('div').parent('.collapse_filter').addClass('test');
            $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').addClass('childrens');
                
            
            $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
            $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
            $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideToggle();
            $('ul.bef-tree-depth-1').find('label').removeClass("passive");

        })
    }
});


$(document).ready(function chekingChildrens(){
    $('.collapse_filter').find('input').click(function(){

        var $input = $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input');
        
        //If checked - remove this attribute on click, else add.
        if($(this).find('li.childrens')) {
            if($input.is(':checked')){
                $input.removeAttr('checked');
            } else {
                $input.removeClass('active-child');
                $input.prop('checked', true);
            }
        };
    });
    
    var $input = $('.collapse_filter').children('div ul').children('li').find('input');
    
    //when we click on children item - only one must be active, but 
    $input.click(function(){
       $('.collapse_filter').children('div').children('input').removeAttr('checked');
       $('.collapse_filter').children('div ul').children('li').find('input').removeAttr('checked');; 
       $(this).prop('checked', true);
       $(this).toggleClass('active-child');
            $(this).click(function(){
                if($(this).is(':checked')){
                    $(this).addClass('active-child');
                    $(this).removeAttr('checked');
                } else {
                    $(this).removeClass('active-child');
                    $(this).addClass('active-child');
                    $(this).prop('checked', true);
                }
            });
       
    });
       
    $('.collapse_filter').children('div').children('input').click(function(){
        if($('.collapse_filter').children('div ul').children('li').find('input').is('.active-child')) {
           $('.collapse_filter').children('div').children('input').removeAttr('checked');
           $('.collapse_filter').children('div ul').children('li').find('input').removeAttr('checked');
        }
    });
        
});

})(jQuery, Drupal, this, this.document);    
