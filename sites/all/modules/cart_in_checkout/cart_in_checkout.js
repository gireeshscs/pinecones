(function ($, Drupal, window, document, undefined){   
    $(document).ready(function() {
var Drupal = Drupal || { 'settings': {}, 'behaviors': {}, 'themes': {}, 'locale': {} };
jQuery.extend(Drupal.settings, { "basePath": "/" });
$(document).ready(function(){
	
	//submit form on cart update START 
	var row_count  = $('fieldset#cart-pane table.sticky-enabled tr').length;
	for(i=0;i<row_count;i++){
		$('#edit-panes-cart-cart-review-table-'+ i +'-qty').change(function(){
			
			var cart_qty ;
			for(j=0;j<row_count;j++){
				if($('#edit-panes-cart-cart-review-table-'+ j +'-qty').val()){
					cart_qty = cart_qty + "-" + $('#edit-panes-cart-cart-review-table-'+ j +'-qty').val();
				}
			}
			cart_q = cart_qty.substr(10);
			window.location.href = Drupal.settings.basePath + "update_cart/" + cart_q;
		});
	}
	//submit form on cart update END
	});
  
    });  
})(jQuery, Drupal, this, this.document);        