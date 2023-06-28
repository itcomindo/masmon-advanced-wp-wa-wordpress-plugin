<?php
defined('ABSPATH') || exit;

//=========================get template styling=========================
function mmwpwa_template()
{
    $mmwpwastyle = carbon_get_theme_option('mmwpwastyle');
    return $mmwpwastyle;
}


//=========================chat position=========================
function mmwpwa_chat_position()
{
    $mmwpwaposition = carbon_get_theme_option('mmwpwaposition');
    if ($mmwpwaposition == 'bottom-left') {
        $mmwpwaposition = 'bottomleft';
    } elseif ($mmwpwaposition == 'bottom-center') {
        $mmwpwaposition = 'bottomcenter';
    } else {
        $mmwpwaposition = 'bottomright';
    }
    return $mmwpwaposition;
}


//=========================container section=========================

function mmwpwa_containerbg()
{
    $containerbg = carbon_get_theme_option('mmwpwacontainerbg');
    return $containerbg;
}


/**
 *=========================
 *NAME: mmwpwa container or parent
 *=========================
 */

function mmwpwa_frontend()
{
    $mmwpwa_template = mmwpwa_template();
    $mmwpwafirstload = carbon_get_theme_option('mmwpwafirstload');
    if ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style1') {
        $flstat = 'active';
    } elseif ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style2') {
        $flstat = 'active';
    } elseif ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style3') {
        $flstat = 'inactive';
    } else {
        $flstat = 'inactive';
    }
?>
    <div id="mmwpwapr" class="<?php echo mmwpwa_template() . ' ' . mmwpwa_chat_position() . ' ' . $flstat ?> " style="background-color: <?php echo mmwpwa_containerbg(); ?>;" data-cond="<?php echo $mmwpwafirstload; ?>">

        <!-- toggle close and open -->
        <?php echo mmwpwa_closechatbutton(); ?>
        <?php echo mmwpwa_openchatbutton(); ?>

        <!-- top section -->
        <?php echo mmwpwa_top_section(); ?>

        <!-- bottom section -->
        <?php echo mmwpwa_bottom_section(); ?>
    </div>
<?php
}
function show_mmwpwa_frontend()
{
    $mmwpwastatus = carbon_get_theme_option('mmwpwastatus');
    if ($mmwpwastatus == true) {
        mmwpwa_frontend();
    } else {
        // do nothing
    }
}
add_action('wp_footer', 'show_mmwpwa_frontend', 100);

//=========================toggle First Load=========================
function mmwpwa_toggle_open()
{
    $mmwpwa_template = mmwpwa_template();
    $mmwpwafirstload = carbon_get_theme_option('mmwpwafirstload');
    if ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style1') {
        $mmwpwafirstload = 'inactive';
    } elseif ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style2') {
        $mmwpwafirstload = 'inactive';
    } elseif ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style3') {
        $mmwpwafirstload = 'active';
    } else {
        $mmwpwafirstload = 'active';
    }
    return $mmwpwafirstload;
}

//=========================open chat=========================

function mmwpwa_openchatbutton()
{
    $toggle = mmwpwa_toggle_open();
    $mmwaopentxt = carbon_get_theme_option('mmwaopentxt');
    if (empty($mmwaopentxt)) {
        $mmwaopentxt = 'Chat/Call';
    } else {
        $mmwaopentxt = $mmwaopentxt;
    }
?>
    <div id="mmwpwaopen" class="<?php echo mmwpwa_template() . ' ' . $toggle ?>">
        <?php echo $mmwaopentxt; ?>
    </div>
<?php
}

//=========================close toggle=========================


function mmwpwa_toggle_close()
{
    $mmwpwa_template = mmwpwa_template();
    $mmwpwafirstload = carbon_get_theme_option('mmwpwafirstload');
    if ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style1') {
        $mmwpwafirstload = 'active';
    } elseif ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style2') {
        $mmwpwafirstload = 'active';
    } elseif ($mmwpwafirstload == 'open' && $mmwpwa_template == 'style3') {
        $mmwpwafirstload = 'inactive';
    } else {
        $mmwpwafirstload = 'inactive';
    }
    return $mmwpwafirstload;
}


//=========================close chat=========================

function mmwpwa_closechatbutton()
{
    $toggle = mmwpwa_toggle_close();
    $mmwpwaclosetxt = carbon_get_theme_option('mmwpwaclosetxt');
    if (empty($mmwpwaclosetxt)) {
        $mmwpwaclosetxt = 'Close';
    } else {
        $mmwpwaclosetxt = $mmwpwaclosetxt;
    }
?>
    <div id="mmwpwaclose" class="<?php echo mmwpwa_template() . ' ' . $toggle ?>">
        <?php echo $mmwpwaclosetxt; ?>
    </div>
    <?php
}

//=========================top section=========================


function mmwpwa_website_logo()
{
    $mmwpwalogobg = carbon_get_theme_option('mmwpwalogobg');
    $mmwpwastyle = carbon_get_theme_option('mmwpwastyle');
    if ($mmwpwastyle == 'style2') {
        $topbgstyle = 'style="background-color: ' . $mmwpwalogobg . ';"';
    } else {
        $topbgstyle = '';
    }
    $mmwpwalogo = carbon_get_theme_option('mmwpwalogo');
    if (empty($mmwpwalogo)) {
        // load fontawesome icon
    ?>
        <div class="mmwpwalogo <?php echo mmwpwa_template(); ?>" <?php echo $topbgstyle; ?>>
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                </svg>
            </i>
        </div>
    <?php
    } else {
    ?>
        <div class="mmwpwalogo <?php echo mmwpwa_template(); ?>" <?php echo $topbgstyle; ?>>
            <img width="60" height="60" src="<?php echo $mmwpwalogo; ?>" alt="Customer Services">
        </div>
    <?php
    }
}


function mmwpwa_top_section()
{
    $mmwpwatopbg = carbon_get_theme_option('mmwpwatopbg');
    $mmwpwatoptext = carbon_get_theme_option('mmwpwatoptext');
    $mmwpwatopgreeting = carbon_get_theme_option('mmwpwatopgreeting');
    ?>
    <div id="mmwpwatop" style="background-color: <?php echo $mmwpwatopbg; ?>; color: <?php echo $mmwpwatoptext; ?>" class="<?php echo mmwpwa_template(); ?>">
        <?php echo mmwpwa_website_logo() . ' ' . $mmwpwatopgreeting ?>
    </div>
<?php
}

//=========================bottom section=========================
function mmwpwa_bottom_section()
{
    $mmwpwabottombg = carbon_get_theme_option('mmwpwabottombg');
?>
    <div id="mmwpwabot" style="background-color: <?php echo $mmwpwabottombg; ?>;" class="<?php echo mmwpwa_template(); ?>">
        <?php echo mmwpwa_complex_staff_data(); ?>
    </div>
    <?php
}


//=========================complex staff data=========================
function mmwpwa_complex_staff_data()
{
    $mmwpwaitems = carbon_get_theme_option('mmwpwaitems');
    foreach ($mmwpwaitems as $staff) {
        // get staff status and set to active or inactive
        $staffstatus = $staff['mmwpwastaffstatus'];
        if ($staffstatus == false) {
            $staffstatus = 'inactive';
        } else {
            $staffstatus = 'active';
        }

        //=========================staff photo=========================
        $staffphoto = $staff['mmwpwastaffphoto'];
        if (empty($staffphoto)) {
            $staffphoto = plugins_url('images/staff.webp', __FILE__);
            $staffphoto = '<img width="50" height="50" src="' . $staffphoto . '" alt="staff">';
        } else {
            $staffphoto = '<img width="50" height="50" src="' .  $staffphoto . '" alt="staff">';
        }

        //=========================staff name=========================
        $staffname = $staff['mmwpwastaffname'];
        if (empty($staffname)) {
            $staffname = 'Staff Name';
        } else {
            $staffname = $staff['mmwpwastaffname'];
        }

        //=========================staff job=========================
        $staffjob = $staff['mmwpwastaffjob'];
        if (empty($staffjob)) {
            $staffjob = 'Staff Job';
        } else {
            $staffjob = $staff['mmwpwastaffjob'];
        }

        /**
         *=========================
         *NAME: The Buttons
         *=========================
         */

        //=========================start chat button=========================


        //=========================chat bg color=========================
        $chatbgcolor = carbon_get_theme_option('mmwpwabuttonwabg');
        if (empty($chatbgcolor)) {
            $chatbgcolor = 'darkgreen';
        } else {
            $chatbgcolor = $chatbgcolor;
        }

        //=========================chat text color=========================
        $chattextcolor = carbon_get_theme_option('mmwpwabuttonwatext');
        if (empty($chattextcolor)) {
            $chattextcolor = 'white';
        } else {
            $chattextcolor = $chattextcolor;
        }

        //=========================wa number and message =========================
        $staffchatnumber = $staff['mmwpwachatnumber'];
        $chatmessage = $staff['mmwpwacustomwamessagestext'];
        $staffchatnumber = substr_replace($staffchatnumber, '62', 0, 1);
        $staffchatnumber = str_replace('-', '', $staffchatnumber);

        if (empty($chatmessage)) {
            $staffchatnumber = $staffchatnumber;
        } else {
            $staffchatnumber = $staffchatnumber . '&text=' . $chatmessage;
        }

        //=========================wa custom text message=========================



        //=========================wa text button=========================
        $chattext = carbon_get_theme_option('mmwpwabuttonwachattxt');
        if (empty($chattext)) {
            $chattext = 'chats';
        } else {
            $chattext = $chattext;
        }
        //=========================END CHAT BUTTON=========================



        //=========================START BUTTON=========================

        //=========================call bg color=========================
        $callbgcolor = carbon_get_theme_option('mmwpwabuttoncallbg');
        if (empty($callbgcolor)) {
            $callbgcolor = 'darkred';
        } else {
            $callbgcolor = $callbgcolor;
        }

        //=========================call text color=========================

        $calltextcolor = carbon_get_theme_option('mmwpwabuttoncalltext');
        if (empty($calltextcolor)) {
            $calltextcolor = 'white';
        } else {
            $calltextcolor = $calltextcolor;
        }

        //=========================call text button=========================
        $calltext = carbon_get_theme_option('mmwpwabuttoncalltxt');
        if (empty($calltext)) {
            $calltext = 'call';
        } else {
            $calltext = $calltext;
        }

        //=========================call number=========================
        $staffcallnumber = $staff['mmwpwacallnumber'];
        $staffcallnumber = substr_replace($staffcallnumber, '+62', 0, 1);
        $staffcallnumber = str_replace('-', '', $staffcallnumber);

        //=========================staff status enable or disable=========================
        $staffstatus = $staff['mmwpwastaffstatus'];
        if ($staffstatus == true) {
            $staffstatus = 'disabled';
        } else {
            $staffstatus = 'enabled';
        }

        //=========================Staff Task=========================
        $stafftask = $staff['mmwpwastafftask'];
        if ($stafftask == 'chatandcall') {
            $call = 'enabled';
            $chat = 'enabled';
        } elseif ($stafftask == 'chatonly') {
            $call = 'disabled';
            $chat = 'enabled';
        } elseif ($stafftask == 'callonly') {
            $call = 'enabled';
            $chat = 'disabled';
        } else {
            // do nothing
        }

        //=========================chat item styling=========================
        $mmwpwachatitembg = carbon_get_theme_option('mmwpwachatitembg');
        if (empty($mmwpwachatitembg)) {
            $mmwpwachatitembg = '#f5f5f5';
        } else {
            $mmwpwachatitembg = $mmwpwachatitembg;
        }
        $mmwpwachatitemtext = carbon_get_theme_option('mmwpwachatitemtext');
        if (empty($mmwpwachatitemtext)) {
            $mmwpwachatitemtext = '#000000';
        } else {
            $mmwpwachatitemtext = $mmwpwachatitemtext;
        }

        $chatitemstyling = 'style="background-color:' . $mmwpwachatitembg . '; color:' . $mmwpwachatitemtext . ';"';

    ?>
        <div class="mmwpwaitem <?php echo mmwpwa_template() . ' ' . $staffstatus ?>" <?php echo $chatitemstyling; ?>>
            <!-- staff left -->
            <div class="mmwpwaleft <?php echo mmwpwa_template(); ?>">
                <?php echo $staffphoto; ?>
            </div>

            <!-- staff right -->
            <div class="mmwpwaright <?php echo mmwpwa_template(); ?>">

                <!-- staff name and job-->
                <div class="mmwpwastaffwr <?php echo mmwpwa_template(); ?>">
                    <!-- staff name -->
                    <span class="staffname <?php echo mmwpwa_template(); ?>">
                        <?php echo $staffname; ?>
                    </span>
                    <!-- staff job -->
                    <span class="staffjob <?php echo mmwpwa_template(); ?>">
                        <?php echo $staffjob; ?>
                    </span>
                </div>

                <!-- staff button wr-->
                <div class="mmwpwabtnwr <?php echo mmwpwa_template(); ?>">

                    <!-- chat button -->
                    <div style="background-color:<?php echo $chatbgcolor; ?>; color:<?php echo $chattextcolor; ?>" class="mmwpwabtn mmwpwachatbtn <?php echo mmwpwa_template() . ' ' . $chat ?>" data-wa="<?php echo $staffchatnumber; ?>">
                        <?php echo $chattext; ?>
                    </div>

                    <!-- call button -->
                    <div style="background-color:<?php echo $callbgcolor; ?>; color:<?php echo $calltextcolor; ?>;" class="mmwpwabtn mmwpwacallbtn <?php echo mmwpwa_template() . ' ' . $call ?>" data-call="<?php echo $staffcallnumber; ?>">
                        <?php echo $calltext; ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}


/**
 *=========================
 *NAME: Create new Timezone according to Jakarta Indonesia
 *=========================
 */
function mmwpwa_timezone()
{
    // create new time zone
    $tz_object = new DateTimeZone('Asia/Jakarta');
    $datetime = new DateTime('now', $tz_object);
    $time = $datetime->format('Hi');
    return $time;
}
