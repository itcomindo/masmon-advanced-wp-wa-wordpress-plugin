window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        const mmwpwapaoptionsep = jQuery('.mmwacbseparator');
        jQuery(mmwpwapaoptionsep).click(function () {
            jQuery(this).next('.mmwpwapaoptionsep-child').slideToggle();
        });

        jQuery('.mmwpwastyle').click(function () {
            jQuery(this).siblings('.mmwpwastylingsep-child').slideToggle();
        });
        jQuery('.mmwpwacontainersep').click(function () {
            jQuery(this).siblings('.mmwpwacontainersep-child').slideToggle();
        });
        jQuery('.mmwpwatopstylingsep').click(function () {
            jQuery(this).siblings('.mmwpwatopstylingsep-child').slideToggle();
        });
        jQuery('.mmwpwabottomstylingsep').click(function () {
            jQuery(this).siblings('.mmwpwabottomstylingsep-child').slideToggle();
        });
        jQuery('.mmwpwaitemstylingsep').click(function () {
            jQuery(this).siblings('.mmwpwaitemstylingsep-child').slideToggle();
        });
        jQuery('.mmwpwabuttonstylingsep').click(function () {
            jQuery(this).siblings('.mmwpwabuttonstylingsep-child').slideToggle();
        });
        jQuery('.mmwpwalogoandotherstylingsep').click(function () {
            jQuery(this).siblings('.mmwpwalogoandotherstylingsep-child').slideToggle();
        });
        jQuery('.mmwpwastaffsep').click(function () {
            jQuery(this).siblings('.mmwpwastaffsep-child').slideToggle();
        });

        const mmwpwashrinkall = jQuery('.mmwpwashrinkall input');
        // when mmwpwashrinkall clicked then save to local storage and keep it until unchecked.
        jQuery(mmwpwashrinkall).click(function () {
            if (jQuery(this).is(':checked')) {
                localStorage.setItem('mmwpwashrinkall', 'true');
                jQuery('.mmwpwastylingsep-child').slideUp();
                jQuery('.mmwpwacontainersep-child').slideUp();
                jQuery('.mmwpwatopstylingsep-child').slideUp();
                jQuery('.mmwpwabottomstylingsep-child').slideUp();
                jQuery('.mmwpwaitemstylingsep-child').slideUp();
                jQuery('.mmwpwabuttonstylingsep-child').slideUp();
                jQuery('.mmwpwalogoandotherstylingsep-child').slideUp();
                jQuery('.mmwpwastaffsep-child').slideUp();
            } else {
                localStorage.setItem('mmwpwashrinkall', 'false');
                jQuery('.mmwpwastylingsep-child').slideDown();
                jQuery('.mmwpwacontainersep-child').slideDown();
                jQuery('.mmwpwatopstylingsep-child').slideDown();
                jQuery('.mmwpwabottomstylingsep-child').slideDown();
                jQuery('.mmwpwaitemstylingsep-child').slideDown();
                jQuery('.mmwpwabuttonstylingsep-child').slideDown();
                jQuery('.mmwpwalogoandotherstylingsep-child').slideDown();
                jQuery('.mmwpwastaffsep-child').slideDown();
            }
        });

        if (localStorage.getItem('mmwpwashrinkall') === 'true') {
            jQuery('.mmwpwastylingsep-child').slideUp();
            jQuery('.mmwpwacontainersep-child').slideUp();
            jQuery('.mmwpwatopstylingsep-child').slideUp();
            jQuery('.mmwpwabottomstylingsep-child').slideUp();
            jQuery('.mmwpwaitemstylingsep-child').slideUp();
            jQuery('.mmwpwabuttonstylingsep-child').slideUp();
            jQuery('.mmwpwalogoandotherstylingsep-child').slideUp();
            jQuery('.mmwpwastaffsep-child').slideUp();
        } else {
            jQuery('.mmwpwastylingsep-child').slideDown();
            jQuery('.mmwpwacontainersep-child').slideDown();
            jQuery('.mmwpwatopstylingsep-child').slideDown();
            jQuery('.mmwpwabottomstylingsep-child').slideDown();
            jQuery('.mmwpwaitemstylingsep-child').slideDown();
            jQuery('.mmwpwabuttonstylingsep-child').slideDown();
            jQuery('.mmwpwalogoandotherstylingsep-child').slideDown();
            jQuery('.mmwpwastaffsep-child').slideDown();
        }


        // when page loaded then check if mmwpwashrinkall is true then check the checkbox.
        if (localStorage.getItem('mmwpwashrinkall') === 'true') {
            jQuery(mmwpwashrinkall).prop('checked', true);
        } else {
            jQuery(mmwpwashrinkall).prop('checked', false);
        }

        /**
        =========================
        *NAME: Conditional For select mmwpwastylingsep-child
        *=========================
        */
        // get the value from select where it's child of div .mmwpwastylingsep-child
        const mmwpwastylingsepchild = jQuery('.mmwpwastylingsep-child select').val();
        console.log(mmwpwastylingsepchild);

        // if mmwpwastylingsepchild is style4, then remove option in chatPosition that have value bottom-center
        if (mmwpwastylingsepchild === 'style4') {
            jQuery('.chatposition select option[value="bottom-center"]').hide();
        } else {
            jQuery('.chatposition select option[value="bottom-center"]').show();
        }

        // on change select mmwpwastylingsepchild, if value is style4 then remove option in chatPosition that have value bottom-center
        jQuery('.mmwpwastylingsep-child select').change(function () {
            const mmwpwastylingsepchild = jQuery(this).val();
            if (mmwpwastylingsepchild === 'style4') {
                jQuery('.chatposition select option[value="bottom-center"]').hide();
            } else {
                jQuery('.chatposition select option[value="bottom-center"]').show();
            }
        });






        // console.log(position);


















    });
});