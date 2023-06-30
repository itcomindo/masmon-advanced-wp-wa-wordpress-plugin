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
    $mmwpwacontainerbg = carbon_get_theme_option('mmwpwacontainerbg');
    if (empty($mmwpwacontainerbg)) {
        $mmwpwacontainerbg = '#ddd';
        $containerbg = 'data-containerbg="' . $mmwpwacontainerbg . '"';
        return $containerbg;
    } else {
        $containerbg = 'data-containerbg="' . carbon_get_theme_option('mmwpwacontainerbg') . '"';
        return $containerbg;
    }
}


/**
 *=========================
 *NAME: mmwpwa container or parent
 *=========================
 */

function mmwpwa_frontend()
{

    //=========================check to run disInCat=========================
    if (is_category()) {
        $disInCat = disInCat(); // this is array that seperated by comma.
        // create array from disInCat to check if catId is not in disInCat
        $disInCat = explode(',', $disInCat);
        // get category id
        $cat = get_queried_object();
        $catID = $cat->term_id;
        // if catId is not in disInCat
        if (in_array($catID, $disInCat)) {
            $showInCat = 'data-cat="disabled"';
        } else {
            $showInCat = 'data-cat="enabled"';
        }
    }

    //=========================Check to run disInPost ID=========================
    if (is_single()) {
        $disInPost = disInPost(); // this is array that seperated by comma.
        // create array from disInPost to check if postId is not in disInPost
        $disInPost = explode(',', $disInPost);
        // get post id
        $post = get_queried_object();
        $postID = $post->ID;
        // if postId is not in disInPost
        if (in_array($postID, $disInPost)) {
            $showInPost = 'data-post="disabled"';
        } else {
            $showInPost = 'data-post="enabled"';
        }
    }

    //=========================Check to run disInPage ID=========================
    if (is_page()) {
        $disInPage = disInPage(); // this is array that seperated by comma.
        // create array from disInPage to check if pageId is not in disInPage
        $disInPage = explode(',', $disInPage);
        // get page id
        $page = get_queried_object();
        $pageID = $page->ID;
        // if pageId is not in disInPage
        if (in_array($pageID, $disInPage)) {
            $showInPage = 'data-page="disabled"';
        } else {
            $showInPage = 'data-page="enabled"';
        }
    }

    //=========================Check to run disInTag ID=========================
    if (is_tag()) {
        $disInTag = disInTag(); // this is array that seperated by comma.
        // create array from disInTag to check if tagId is not in disInTag
        $disInTag = explode(',', $disInTag);
        // get tag id
        $tag = get_queried_object();
        $tagID = $tag->term_id;
        // if tagId is not in disInTag
        if (in_array($tagID, $disInTag)) {
            $showInTag = 'data-tag="disabled"';
        } else {
            $showInTag = 'data-tag="enabled"';
        }
    }

    //=========================Check to run disInCpt=========================
    if (is_singular()) {
        $disInCpt = disInCpt(); // this is array that seperated by comma.
        // create array from disInCpt to check if cptId is not in disInCpt
        $disInCpt = explode(',', $disInCpt);
        // get cpt name
        $cpt = get_post_type();
        // if cptId is not in disInCpt
        if (in_array($cpt, $disInCpt)) {
            $showInCpt = 'data-cpt="disabled"';
        } else {
            $showInCpt = 'data-cpt="enabled"';
        }
    }

    $mmwpwa_template = mmwpwa_template();
    if ($mmwpwa_template == 'style4') {
        // data-photo
        $dataphoto = 'data-photo="' . carbon_get_theme_option('mmwpwastaffphotogreeting') . '"';
        // callout (just for: style 4)
        $datacallout = carbon_get_theme_option('mmwpwacallouttext');
        if (empty($datacallout)) {
            $datacallout = 'data-callout="Customer Service is Here.."';
        } else {
            $datacallout = 'data-callout="' . carbon_get_theme_option('mmwpwacallouttext') . '"';
        }
    } else {
        // do nothing
    }

    // first load
    $mmwpwafirstload = carbon_get_theme_option('mmwpwafirstload');
    if ($mmwpwafirstload == 'open') {
        $flstat = 'active';
    } else {
        $flstat = 'inactive';
    }

?>
    <div id="mmwpwapr" <?php echo $showInCpt; ?> <?php echo $showInTag; ?> <?php echo $showInPage; ?> <?php echo $showInCat ?> <?php echo $showInPost ?> class="<?php echo mmwpwa_template() . ' ' . mmwpwa_chat_position() . ' ' . $flstat ?> " <?php echo mmwpwa_containerbg(); ?> data-cond="<?php echo $mmwpwafirstload; ?>" data-style="<?php echo $mmwpwa_template; ?>" data-position="<?php echo  mmwpwa_chat_position(); ?>" <?php echo $dataphoto . ' ' . $datacallout ?>>

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
    $mmwpwafirstload = carbon_get_theme_option('mmwpwafirstload');
    if ($mmwpwafirstload == 'open') {
        $mmwpwafirstload = 'inactive';
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
    $mmwpwafirstload = carbon_get_theme_option('mmwpwafirstload');
    if ($mmwpwafirstload == 'open') {
        $mmwpwafirstload = 'active';
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

    //=========================check use logo or not=========================
    $mmwpwauselogo = carbon_get_theme_option('mmwpwauselogo');
    if ($mmwpwauselogo == true) {
        $mmwpwalogobg = carbon_get_theme_option('mmwpwalogobg');
        $mmwpwastyle = carbon_get_theme_option('mmwpwastyle');
        if ($mmwpwastyle == 'style2') {
            $topbgstyle = 'data-bg="' . $mmwpwalogobg . '"';
        } else {
            $topbgstyle = '';
        }
        $mmwpwalogo = carbon_get_theme_option('mmwpwalogo');
    ?>
        <div class="mmwpwalogo <?php echo mmwpwa_template(); ?>" <?php echo $topbgstyle; ?>>
            <img width="60" height="60" src="<?php echo $mmwpwalogo; ?>" alt="Customer Services">
        </div>
    <?php
    } else {
        // do nothing
    }
}


function mmwpwa_top_section()
{
    $mmwpwauselogo = carbon_get_theme_option('mmwpwauselogo');
    if ($mmwpwauselogo == true) {
        $mmwpwahaslogo = 'haslogo';
    } else {
        $mmwpwahaslogo = 'nologo';
    }
    $mmwpwatopbg = carbon_get_theme_option('mmwpwatopbg');
    $mmwpwatoptext = carbon_get_theme_option('mmwpwatoptext');
    $mmwpwatopgreeting = '<span class="mmwpwagreeting">' . carbon_get_theme_option('mmwpwatopgreeting') . '</span>';
    ?>
    <div id="mmwpwatop" class="<?php echo mmwpwa_template() . ' ' . $mmwpwahaslogo; ?>" data-bg="<?php echo $mmwpwatopbg; ?>" data-color="<?php echo $mmwpwatoptext; ?>">
        <?php echo mmwpwa_website_logo() . ' ' . $mmwpwatopgreeting ?>
    </div>
<?php
}

//=========================bottom section=========================
function mmwpwa_bottom_section()
{
    $bottombg = carbon_get_theme_option('mmwpwabottombg');
    if (empty($bottombg)) {
        $mmwpwabottombg = 'data-bg="#ddd"';
    } else {
        $mmwpwabottombg = 'data-bg="' . carbon_get_theme_option('mmwpwabottombg') . '"';
    }



?>
    <div id="mmwpwabot" class="<?php echo mmwpwa_template(); ?>" <?php echo $mmwpwabottombg; ?>>
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
        $mmwpwachatitembg = carbon_get_theme_option('mmwpwaitembg');
        if (empty($mmwpwachatitembg)) {
            $mmwpwachatitembg = '#f5f5f5';
        } else {
            $mmwpwachatitembg = $mmwpwachatitembg;
        }
        $mmwpwachatitemtext = carbon_get_theme_option('mmwpwaitemtext');
        if (empty($mmwpwachatitemtext)) {
            $mmwpwachatitemtext = '#000000';
        } else {
            $mmwpwachatitemtext = $mmwpwachatitemtext;
        }

        // $chatitemstyling = 'style="background-color:' . $mmwpwachatitembg . '; color:' . $mmwpwachatitemtext . ';"';

        $chatitemstyling = 'data-bg="' . $mmwpwachatitembg . '" data-color="' . $mmwpwachatitemtext . '"';


        /**
         *=========================
         *NAME: Chat Number And Messages
         *=========================
         */


        //=========================wa message =========================
        $standardmessage = $staff['mmwpwacustomwamessagestext'];
        if (empty($standardmessage)) {
            $chatmessage = "Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20anda";
        } else {
            $chatmessage = str_replace(' ', '%20', $staff['mmwpwacustomwamessagestext']);
        }

        $includeposttitle = $staff['mmwpwaincludeposttitle'];
        $includewoo = $staff['mmwpwaincludewoocommerceproducttitle'];

        if ($includeposttitle == true && is_singular('post')) {
            $mmwpwaTheTitle = str_replace(' ', '%20', get_the_title());
            $chatmessage = str_replace(' ', '%20', $staff['mmwpwacustomwamessagestextwithposttitle']);
            if (empty($chatmessage)) {
                $chatmessage = 'Hi,%20mohon%20info%20tentang%20' . $mmwpwaTheTitle . '%20ya';
            } else {
                $chatmessage = $chatmessage . '*' . $mmwpwaTheTitle . '*';
            }
        } elseif ($includewoo == true && is_singular('product')) {
            $mmwpwaTheTitle = str_replace(' ', '%20', get_the_title());
            $chatmessage = str_replace(' ', '%20', $staff['mmwpwacustomwamessagestextwithwoocommerceproducttitle']);
            if (empty($chatmessage)) {
                $chatmessage = 'Hi,%20mohon%20info%20produkx%20' . $mmwpwaTheTitle . '%20ya';
            } else {
                $chatmessage = $chatmessage . '*' . $mmwpwaTheTitle . '*';
            }
        } else {
            $chatmessage = $chatmessage;
        }

        //=========================wa number =========================
        $staffchatnumber = $staff['mmwpwachatnumber'];
        $staffchatnumber = substr_replace($staffchatnumber, '62', 0, 1);
        $staffchatnumber = str_replace('-', '', $staffchatnumber) . '&text=' . $chatmessage;


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
                    <span>
                        <?php echo disInCat(); ?>
                    </span>
                </div>

                <!-- staff button wr-->
                <div class="mmwpwabtnwr <?php echo mmwpwa_template(); ?>">

                    <!-- chat button -->
                    <div class="mmwpwabtn mmwpwachatbtn <?php echo mmwpwa_template() . ' ' . $chat ?>" data-bg="<?php echo $chatbgcolor; ?>" data-color="<?php echo $chattextcolor; ?>" data-wa="<?php echo $staffchatnumber; ?>">
                        <?php echo $chattext; ?>
                    </div>

                    <!-- call button -->
                    <div class="mmwpwabtn mmwpwacallbtn <?php echo mmwpwa_template() . ' ' . $call ?>" data-bg="<?php echo $callbgcolor; ?>" data-color="<?php echo $calltextcolor; ?>" data-call="<?php echo $staffcallnumber; ?>">
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
    // wait for use later
}




//=========================Chat Messages=========================
function mmwpwa_the_wa_messagesss()
{
    $standardmessage = $staff['mmwpwacustomwamessagestext'];
    if (empty($standardmessage)) {
        // get blog url
        $blogurl = get_bloginfo('url');
        $chatmessage = "Halo,%20'.$blogurl.'";
    } else {
        $chatmessage = $staff['mmwpwacustomwamessagestext'];
    }

    $includeposttitle = $staff['mmwpwaincludeposttitle'];
    $includewoo = $staff['mmwpwaincludewoocommerceproducttitle'];

    if ($includeposttitle == true) {
        if (is_singular('post')) {
            $mmwpwaTheTitle = get_the_title();
            $chatmessage = $staff['mmwpwacustomwamessagestextwithposttitle'];
            if (empty($chatmessage)) {
                $chatmessage = 'Hi,%20mohon%20info%20tentang%20' . $mmwpwaTheTitle . '%20ya';
            } else {
                $chatmessage = $chatmessage . '*' . $mmwpwaTheTitle . '*';
            }
        }
    } elseif ($includewoo == true) {
        if (is_singular('product')) {
            $mmwpwaTheTitle = get_the_title();
            $chatmessage = $staff['mmwpwacustomwamessagestextwithwoocommerceproducttitle'];
            if (empty($chatmessage)) {
                $chatmessage = 'Hi,%20mohon%20info%20produk%20' . $mmwpwaTheTitle . '%20ya';
            } else {
                $chatmessage = $chatmessage . '*' . $mmwpwaTheTitle . '*';
            }
        }
    } else {
        $chatmessage = $chatmessage;
    }
}
