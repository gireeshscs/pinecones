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
                
                /*$(this).parent('div').parent('.collapse_filter').children('div ul').click(function(){
                    $(this).children('li').toggleClass('open');
                });*/
                
            $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
            $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
            $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideToggle();
            $('ul.bef-tree-depth-1').find('label').removeClass("passive");

        })
    }
});

})(jQuery, Drupal, this, this.document);    
