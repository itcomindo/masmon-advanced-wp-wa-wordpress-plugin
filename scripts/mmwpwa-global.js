window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {

        /*=========================Check disInCat=========================*/
        const disInCatVal = jQuery('#mmwpwapr').data('cat');
        if (disInCatVal == 'disabled') {
            jQuery('#mmwpwapr').remove();
        } else {
            // do nothing
        }

        /*=========================Check disInPost=========================*/
        const disInPostVal = jQuery('#mmwpwapr').data('post');
        if (disInPostVal == 'disabled') {
            jQuery('#mmwpwapr').remove();
        } else {
            // do nothing
        }

        /*=========================Check disInPage=========================*/
        const disInPageVal = jQuery('#mmwpwapr').data('page');
        if (disInPageVal == 'disabled') {
            jQuery('#mmwpwapr').remove();
        } else {
            // do nothing
        }

        /*=========================Check disInTag=========================*/
        const disInTagVal = jQuery('#mmwpwapr').data('tag');
        if (disInTagVal == 'disabled') {
            jQuery('#mmwpwapr').remove();
        } else {
            // do nothing
        }

        /*=========================Check disCpt=========================*/
        const disCptVal = jQuery('#mmwpwapr').data('cpt');
        if (disCptVal == 'disabled') {
            jQuery('#mmwpwapr').remove();
        } else {
            // do nothing
        }









    });
});