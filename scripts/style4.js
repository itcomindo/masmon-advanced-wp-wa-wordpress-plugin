window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {

        const chatPosition = jQuery('#mmwpwapr').data('position');
        const photoStaff = jQuery('#mmwpwapr').data('photo');
        const dataCallout = jQuery('#mmwpwapr').data('callout');

        const toggleOpen = '<div id="mmwpwatoggleOpen" class="' + chatPosition + '"><span class="mmwpwacallout">' + dataCallout + '</span><img width="72" height="72" src="wp-content/plugins/masmon-wp-wa/images/' + photoStaff + '.png"></div>';

        jQuery('#mmwpwapr').addClass('inactive').removeClass('active');
        jQuery('#mmwpwaopen, #mmwpwaclose, #mmwpwatop').remove();
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



        /**
        =========================
        *NAME: Dont Disturb Code Below This Line
        *=========================
        */
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