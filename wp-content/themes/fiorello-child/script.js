//
//
//

jQuery(document).ready(function($) {

  if( $('body').hasClass('woocommerce-checkout') ){

    //This is a hack, I know. This will be replaced with the theme rebuild.
    setInterval(function(){
      if( $('#shipping_method_0_local_pickup13').length ){
        if( $('#shipping_method_0_local_pickup13').is(':checked') && !$('#localpickup-note').length ){
          $('table.shop_table.woocommerce-checkout-review-order-table').after('<div id="localpickup-note">Friends, just a quick note: if you select Local Pickup as your Shipping Method, you will have to come to our farm in Naples, NY to receive your order.</div>');
        }
        if( !$('#shipping_method_0_local_pickup13').is(':checked') && $('#localpickup-note').length ){
          $('#localpickup-note').remove();
        }
      }
    }, 3000);

  }

});
