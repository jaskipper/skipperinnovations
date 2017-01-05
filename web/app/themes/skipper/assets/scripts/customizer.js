(function($) {
  // Site title
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.brand').text(to);
    });
  });
  // Description
  wp.customize('fp_description', function(value) {
    value.bind(function(newdesc) {
      $('#fpdescription .desc').text(newdesc);
    });
  });
  // BG Header Image
  wp.customize(
    'header_bg_image',
    function(value) {
      value.bind(
        function(newimage) {
          $('#landing').css('background-image: url(' + newimage + ');');
    } );
    } );

})(jQuery);
