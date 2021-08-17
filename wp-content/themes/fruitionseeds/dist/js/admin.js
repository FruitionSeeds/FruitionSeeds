
/*
 *
 */

(function($) {

  $(document).ready(function() {

    if($('body').hasClass('woocommerce-page') && $('body').hasClass('post-type-product')) initProductAdminPage();

  });

  function initProductAdminPage(){
    $('#videos_urls_wrapper tr.acf-row button.get-thumbnail').each(function(){
      $(this).click(function(e){
        e.preventDefault();
        var row_id = $(this).parents('.acf-row').data('id');
        var value = $(this).parents('.acf-row').find('td.vimeo_url input').val();
        $('#videos_urls_wrapper tr.acf-row[data-id=' + row_id + ']').find('.thumbnail_url input').addClass('loading');
        $.ajax({
          url: '//vimeo.com/api/v2/video/' + getIdfromVimeoUrl(value) + '.json',
          success: function(result){
            var thumbnail_medium = result[0]['thumbnail_medium'];
            $('#videos_urls_wrapper tr.acf-row[data-id=' + row_id + ']').find('.thumbnail_url input').val(thumbnail_medium).removeClass('loading');
          },
          error: function(){
            alert('Sorry, that didn\'t work for some reason - you can try again or get the thumbnail URL manually');
          }
        });
      });
    });
  }

  function getIdfromVimeoUrl(url){
    var REGEX = /vimeo.*(?:\/|clip_id=)([0-9a-z]*)/i;
    return url.match(REGEX)[1];
  }

})(jQuery);
