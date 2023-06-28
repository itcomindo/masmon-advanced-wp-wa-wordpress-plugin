window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        const toggleOpen = '<div id="mmwpwatoggleOpen"><span>Customer Services</span></div>';
        jQuery('#mmwpwapr').addClass('inactive').removeClass('active');
        jQuery('#mmwpwaopen, #mmwpwaclose').remove();
        jQuery('body').append(toggleOpen);

        jQuery('#mmwpwatoggleOpen').click(function () {
            jQuery('#mmwpwapr').toggleClass('active').toggleClass('inactive');
            // jQuery('#mmwpwatoggleOpen').toggleClass('active').toggleClass('inactive');
            const layer = '<div id="Layer"></div>';
            jQuery('body').append(layer);
            jQuery(this).slideUp();
            jQuery('#Layer').click(function () {
                console.log('Layer Clicked');
                jQuery(this).remove();
                jQuery('#mmwpwapr').toggleClass('active').toggleClass('inactive');
                jQuery('#mmwpwatoggleOpen').slideDown();
            });
        });



        // when page scroll top or bottom make the #mmwpwatoggleOpen opacity 0 but when scroll stop make it 1. Add animation and smooth transition to it.
        jQuery(window).scroll(function () {
            clearTimeout(jQuery.data(this, 'scrollTimer'));
            jQuery('#mmwpwatoggleOpen').css('opacity', '0');
            jQuery.data(this, 'scrollTimer', setTimeout(function () {
                jQuery('#mmwpwatoggleOpen').css('opacity', '1');
            }, 250));
        });

        /*=========================Chat Number=========================*/
        const chatNumber = jQuery('.mmwpwachatbtn').data('wa');
        // when click on chat button then open whatsapp chat
        jQuery('.mmwpwachatbtn').click(function () {
            window.open('https://api.whatsapp.com/send?phone=' + chatNumber);
        });

        /*=========================Call Number=========================*/
        const callNumber = jQuery('.mmwpwacallbtn').data('call');
        // when click on call button then open call
        jQuery('.mmwpwacallbtn').click(function () {
            window.open('tel:' + callNumber);
        });

        /*=========================Disabled Staff=========================*/
        jQuery('.mmwpwaitem.disabled').remove();
        jQuery('.mmwpwachatbtn.disabled').remove();
        jQuery('.mmwpwacallbtn.disabled').remove();




























        /*=========================jQuery end above this line=========================*/

    });
});