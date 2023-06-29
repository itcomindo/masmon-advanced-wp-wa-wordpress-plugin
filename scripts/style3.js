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

        /**
        =========================
        *NAME: CSS
        *=========================
        */

        /*=========================data bg top #mmwpwatop=========================*/
        const topBg = jQuery('#mmwpwatop').data('bg');
        const topColor = jQuery('#mmwpwatop').data('color');
        jQuery('#mmwpwatop').css({
            'background-color': topBg,
            'color': topColor
        });


        /*=========================Data bg logo=========================*/
        const logoBg = jQuery('.mmwpwalogo').data('bg');
        jQuery('.mmwpwalogo').css({
            'background-color': logoBg
        });

        /*=========================Data bg mmwpwabot=========================*/
        const botBg = jQuery('#mmwpwabot').data('bg');
        jQuery('#mmwpwabot').css({
            'background-color': botBg
        });

        /*=========================data bg and text .mmwpwaitem=========================*/
        const itemBg = jQuery('.mmwpwaitem').data('bg');
        const itemColor = jQuery('.mmwpwaitem').data('color');
        jQuery('.mmwpwaitem').css({
            'background-color': itemBg,
            'color': itemColor
        });

        /*=========================Data Color Call=========================*/
        const callBg = jQuery('.mmwpwacallbtn').data('bg');
        const callcolor = jQuery('.mmwpwacallbtn').data('color');

        jQuery('.mmwpwacallbtn').css({
            'background-color': callBg,
            'color': callcolor
        });

        /*=========================Data Color Chat=========================*/
        const chatBg = jQuery('.mmwpwachatbtn').data('bg');
        const chatcolor = jQuery('.mmwpwachatbtn').data('color');

        jQuery('.mmwpwachatbtn').css({
            'background-color': chatBg,
            'color': chatcolor
        });



























        /*=========================jQuery end above this line=========================*/

    });
});