window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        const mmwpwapr = jQuery('#mmwpwapr.style1');
        const dataCond = jQuery('#mmwpwapr').data('cond');

        if (dataCond === 'open') {
            const mmwpwaclose = jQuery('#mmwpwaclose.style1');
            const mmwpwaopen = jQuery('#mmwpwaopen.style1');
            jQuery(mmwpwaclose).click(function () {
                jQuery(mmwpwapr).removeClass('active').addClass('inactive');
                jQuery(mmwpwaclose).removeClass('active').addClass('inactive');
                jQuery(mmwpwaopen).removeClass('inactive').addClass('active');
            });
            jQuery(mmwpwaopen).click(function () {
                jQuery(mmwpwapr).removeClass('inactive').addClass('active');
                jQuery(mmwpwaclose).removeClass('inactive').addClass('active');
                jQuery(mmwpwaopen).removeClass('active').addClass('inactive');
            });
        } else {
            const mmwpwaclose = jQuery('#mmwpwaclose.style1.inactive');
            const mmwpwaopen = jQuery('#mmwpwaopen.style1.active');
            jQuery(mmwpwaclose).click(function () {
                jQuery(mmwpwapr).removeClass('active').addClass('inactive');
                jQuery(mmwpwaclose).removeClass('active').addClass('inactive');
                jQuery(mmwpwaopen).removeClass('inactive').addClass('active');
            });
            jQuery(mmwpwaopen).click(function () {
                jQuery(mmwpwapr).removeClass('inactive').addClass('active');
                jQuery(mmwpwaclose).removeClass('inactive').addClass('active');
                jQuery(mmwpwaopen).removeClass('active').addClass('inactive');
            });
        }

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








    });
});