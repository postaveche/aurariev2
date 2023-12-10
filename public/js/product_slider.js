$(document).ready(function() {
    $("#content-slider").lightSlider({
        loop:true,
        keyPress:true
    });
    $('#image-gallery').lightSlider({
        gallery:true,
        item:1,
        thumbItem:4,
        slideMargin: 0,
        speed:500,
        auto:false,
        loop:true,
        responsive : [],
        onSliderLoad: function() {
            $('#image-gallery').removeClass('cS-hidden');
        }
    });
});
