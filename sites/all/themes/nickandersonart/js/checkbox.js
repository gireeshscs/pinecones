/**
 *@file
 *not used
 **/
(function ($, Drupal, window, document, undefined) {

$(function collapsedTree(){
    if($('ul.bef-tree li').children('ul.bef-tree-child')){
        $('ul.bef-tree li').children('ul.bef-tree-child').parent().addClass('collapse_filter');
        $('.collapse_filter').find('label').addClass("passive");
            $('.collapse_filter').children('div').children('input').click(function(){
                $(this).parent('div').parent('.collapse_filter').addClass('parent');
                $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').addClass('childrens');
           
                $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
           
           $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideDown();
           
           if($(this).prop('checked') == true && $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input').prop('checked') == true){
                    $(this).prop('checked', true);
                    $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input').prop('checked', false);
                } else {
                    if($(this).prop('checked') == false && $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input').prop('checked') == false){
                        $(this).prop('checked', false);
                        $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideUp();
                        $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                        $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
                    }
                }
           
                $('ul.bef-tree-depth-1').find('label').removeClass("passive");
            });

            //when we click on children item - only one must be active 
            
            $('.collapse_filter').children('ul').children('li').find('input').click(function(){
                    var $parent_input = $(this).parent('div').parent('.childrens').parent('ul').parent('.collapse_filter').children('div').find('input');
                   
                    if ($parent_input.prop('checked') == false && $('.collapse_filter').children('ul').children('li').find('input').prop('checked') == false) {
                        $parent_input.prop('checked', true);
                    } else {
                        $parent_input.prop('checked', false);
                    }
                    
            });    
        
        }
});


})(jQuery, Drupal, this, this.document);    
