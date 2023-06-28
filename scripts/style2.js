window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        const mmwpwapr = jQuery('#mmwpwapr.style2');
        const dataCond = jQuery('#mmwpwapr').data('cond');

        if (dataCond === 'open') {
            const mmwpwaclose = jQuery('#mmwpwaclose.style2');
            const mmwpwaopen = jQuery('#mmwpwaopen.style2');
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
            const mmwpwaclose = jQuery('#mmwpwaclose.style2.inactive');
            const mmwpwaopen = jQuery('#mmwpwaopen.style2.active');
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






    });
});