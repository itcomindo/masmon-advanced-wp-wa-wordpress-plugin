<?php
defined('ABSPATH') || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mmwpwa_register_fields');
function mmwpwa_register_fields()
{
    Container::make('theme_options', 'WP WA Options')
        ->add_fields([
            //=========================Fields Start=========================
            Field::make('checkbox', 'mmwpwashrinkall', 'Shrink All')
                ->set_option_value('yes')
                ->set_default_value(false)
                ->set_classes('mmwpwashrinkall'),

            //=========================seperator=========================
            Field::make('separator', 'mmwpwapaoptionsep', 'Options')
                ->set_classes('mmwacbseparator'),

            //=========================checkbox to enabling mmwpwa=========================
            Field::make('checkbox', 'mmwpwastatus', 'Enable WP WA')
                ->set_option_value('yes')
                ->set_default_value(false)
                ->set_classes('mmwpwapaoptionsep-child'),


            //=========================styling options=========================

            Field::make('separator', 'mmwpwastylingsep', 'Styling Template')
                ->set_classes('mmwacbseparator mmwpwastyle')
                ->set_help_text('Styling Template for your Whatsapp box'),

            //=========================select style =========================
            Field::make('select', 'mmwpwastyle', 'Select Style')
                ->set_classes('mmwpwastylingsep-child')
                ->add_options([
                    'style1' => 'Style 1',
                    'style2' => 'Style 2',
                    'style3' => 'Style 3',
                    'style4' => 'Style 4',
                ])
                ->set_help_text('Select Style for your Whatsapp box')
                ->set_width(33),

            //=========================select chat position=========================
            Field::make('select', 'mmwpwaposition', 'Select Position')
                ->set_classes('mmwpwastylingsep-child chatposition')
                ->add_options([
                    'bottom-left' => 'Bottom Left',
                    'bottom-center' => 'Bottom Center',
                    'bottom-right' => 'Bottom Right',
                ])
                ->set_help_text('Select Position for your Whatsapp box')
                ->set_default_value('bottom-left')
                ->set_width(33),

            //=========================select first load condition close or open =========================
            Field::make('select', 'mmwpwafirstload', 'First Load Condition')
                ->set_classes('mmwpwastylingsep-child')
                ->add_options([
                    'open' => 'Open',
                    'close' => 'Close',
                ])
                ->set_help_text('Select First Load Condition for your Whatsapp box')
                ->set_default_value('open')
                ->set_width(33),

            //=========================if mmwpwastyle is style4 then create select option to choose staff photo=========================
            Field::make('select', 'mmwpwastaffphotogreeting', 'Trigger Greeting Photo')
                ->set_classes('mmwpwastylingsep-child')
                ->add_options([
                    's1' => 'Staff 1',
                    's2' => 'Staff 2',
                    's3' => 'Staff 3',
                    's4' => 'Staff 4',
                    's5' => 'Staff 5',
                    's6' => 'Staff 6',
                    's7' => 'Staff 7',
                    's8' => 'Staff 8',
                    's9' => 'Staff 9',
                    's10' => 'Staff 10',
                    's11' => 'Staff 11',
                ])
                ->set_help_text('Select Greeting Trigger Photo for your Whatsapp box (only for style 4)')
                ->set_width(33)
                ->set_conditional_logic([
                    [
                        'field' => 'mmwpwastyle',
                        'value' => 'style4',
                    ],
                ]),


            //=========================text in callout========================
            Field::make('text', 'mmwpwacallouttext', 'Callout Text')
                ->set_classes('mmwpwastylingsep-child')
                ->set_help_text('Callout Text for your Whatsapp box, ketik misal: Hello, selamat datang di website kami. (hanya untuk style4)')
                ->set_width(33)
                ->set_default_value('Hello, selamat datang di website kami.')
                ->set_conditional_logic([
                    [
                        'field' => 'mmwpwastyle',
                        'value' => 'style4',
                    ],
                ]),





            /**
             *=========================
             *Container Option
             *=========================
             */

            Field::make('separator', 'mmwpwacontainersep', 'Container option')
                ->set_classes('mmwacbseparator mmwpwacontainersep'),
            //=========================color container background=========================
            Field::make('color', 'mmwpwacontainerbg', 'Container Background Color')
                ->set_default_value('#eeeeee')
                ->set_width(33)
                ->set_classes('mmwpwacontainersep-child'),

            //=========================chatitem bg color=========================
            Field::make('color', 'mmwpwachatitembg', 'Chat Item Background Color')
                ->set_default_value('#eeeeee')
                ->set_width(33)
                ->set_classes('mmwpwacontainersep-child'),

            //=========================chatitem text color=========================
            Field::make('color', 'mmwpwachatitemtext', 'Chat Item Text Color')
                ->set_default_value('#000000')
                ->set_width(33)
                ->set_classes('mmwpwacontainersep-child'),


            /**
             *=========================
             *top section option
             *=========================
             */

            Field::make('separator', 'mmwpwatopstylingsep', 'Top Element Styling')
                ->set_classes('mmwacbseparator mmwpwatopstylingsep'),


            //=========================top background color=========================
            Field::make('color', 'mmwpwatopbg', 'Top Background Color')
                ->set_default_value('#01A356')
                ->set_width(33)
                ->set_classes('mmwpwatopstylingsep-child'),
            //=========================top text color=========================
            Field::make('color', 'mmwpwatoptext', 'Top Text Color')
                ->set_default_value('#ffffff')
                ->set_width(33)
                ->set_classes('mmwpwatopstylingsep-child'),
            //=========================Greeting Text=========================
            Field::make('text', 'mmwpwatopgreeting', 'Greeting Text')
                ->set_default_value('Hi! How can we help you?')
                ->set_width(33)
                ->set_classes('mmwpwatopstylingsep-child'),


            /**
             *=========================
             *NAME Bottom section option
             *=========================
             */

            Field::make('separator', 'mmwpwabottomstylingsep', 'Bottom Element Styling')
                ->set_classes('mmwacbseparator mmwpwabottomstylingsep'),

            //=========================bottom bg color=========================
            Field::make('color', 'mmwpwabottombg', 'Bottom Background Color')
                ->set_default_value('#f5deb3')
                ->set_classes('mmwpwabottomstylingsep-child'),


            /**
             *=========================
             *Item Styling Options
             *=========================
             */
            Field::make('separator', 'mmwpwaitemstylingsep', 'Staff Container Item Styling')
                ->set_classes('mmwacbseparator mmwpwaitemstylingsep'),

            //=========================item bg color=========================
            Field::make('color', 'mmwpwaitembg', 'Item Background Color')
                ->set_default_value('#eeeeee')
                ->set_width(50)
                ->set_classes('mmwpwaitemstylingsep-child'),


            //=========================item text color=========================
            Field::make('color', 'mmwpwaitemtext', 'Item Text Color')
                ->set_default_value('#000000')
                ->set_width(50)
                ->set_classes('mmwpwaitemstylingsep-child'),


            /**
             *=========================
             *NAME Chat Button Styling
             *@todo chat button styling
             *=========================
             */

            Field::make('separator', 'mmwpwabuttonstylingsep', 'Chat Button Styling')
                ->set_classes('mmwacbseparator mmwpwabuttonstylingsep'),

            //=========================Chat button bg color=========================
            Field::make('color', 'mmwpwabuttonwabg', 'Chat Button Background Color')
                ->set_default_value('#01A356')
                ->set_width(33)
                ->set_classes('mmwpwabuttonstylingsep-child'),

            //=========================Chat button text color=========================
            Field::make('color', 'mmwpwabuttonwatext', 'Chat Button Text Color')
                ->set_default_value('#ffffff')
                ->set_width(33)
                ->set_classes('mmwpwabuttonstylingsep-child'),

            //=========================chat text========================
            Field::make('text', 'mmwpwabuttonwachattxt', 'Chat Button Text')
                ->set_default_value('Chat Now')
                ->set_width(33)
                ->set_classes('mmwpwabuttonstylingsep-child'),


            /**
             *=========================
             *NAME Call Button Styling
             *@todo call button styling
             *=========================
             */

            //=========================Call button bg color=========================
            Field::make('color', 'mmwpwabuttoncallbg', 'Call Button Background Color')
                ->set_default_value('#8B0000')
                ->set_width(33)
                ->set_classes('mmwpwabuttonstylingsep-child'),

            //=========================Call button text color=========================
            Field::make('color', 'mmwpwabuttoncalltext', 'Call Button Text Color')
                ->set_default_value('#ffffff')
                ->set_width(33)
                ->set_classes('mmwpwabuttonstylingsep-child'),

            //=========================Call text========================
            Field::make('text', 'mmwpwabuttoncalltxt', 'Call Button Text')
                ->set_default_value('Call Now')
                ->set_width(33)
                ->set_classes('mmwpwabuttonstylingsep-child'),

            /**
             *=========================
             *logo option, open chat text option, close chat text option
             *=========================
             */

            Field::make('separator', 'mmwpwalogoandotherstylingsep', 'Logo and other options')
                ->set_classes('mmwacbseparator mmwpwalogoandotherstylingsep'),

            //=========================checkbox to ask use logo on top section or not=========================
            Field::make('checkbox', 'mmwpwauselogo', 'Use Logo')
                ->set_option_value('yes')
                ->set_default_value(false)
                ->set_classes('mmwpwalogoandotherstylingsep-child'),


            //=========================logo=========================
            Field::make('image', 'mmwpwalogo', 'Logo')
                ->set_value_type('url')
                ->set_help_text('Upload your logo here, size recommended 50x50px tanpa warna background')
                ->set_classes('mmwpwalogoandotherstylingsep-child')
                ->set_required(true)
                ->set_conditional_logic([
                    [
                        'field' => 'mmwpwauselogo',
                        'value' => true,
                    ],
                ]),

            //=========================logo background color if mmwpwastyle is style2=========================
            Field::make('color', 'mmwpwalogobg', 'Logo Background Color only for style2')
                ->set_help_text('Logo background color is just for style2')
                ->set_default_value('#01A356')
                ->set_conditional_logic([
                    [
                        'field' => 'mmwpwastyle',
                        'value' => 'style2',
                    ],
                ])
                ->set_classes('mmwpwalogoandotherstylingsep-child'),


            // input to disable in specific category by id
            Field::make('text', 'mmwpwadisableincategory', 'Disable in Category')
                ->set_classes('mmwpwalogoandotherstylingsep-child')
                ->set_help_text('Enter Category ID seperate by comma to disable WP WA in that category: contoh: 1,2,3')
                ->set_width(33),

            // input to disable in specific post by id
            Field::make('text', 'mmwpwadisableinpost', 'Disable in Post')
                ->set_classes('mmwpwalogoandotherstylingsep-child')
                ->set_help_text('Enter Post ID seperate by comma to disable WP WA in that post: contoh: 1,2,3')
                ->set_width(33),

            // input to disable in specific page by id
            Field::make('text', 'mmwpwadisableinpage', 'Disable in Page')
                ->set_classes('mmwpwalogoandotherstylingsep-child')
                ->set_help_text('Enter Page ID seperate by comma to disable WP WA in that page: contoh: 1,2,3')
                ->set_width(33),

            // input to disable in specific tag by id
            Field::make('text', 'mmwpwadisableintag', 'Disable in Tag')
                ->set_classes('mmwpwalogoandotherstylingsep-child')
                ->set_help_text('Enter Tag ID seperate by comma to disable WP WA in that tag: contoh: 1,2,3')
                ->set_width(33),

            // input to disable in specific custom post type by id
            Field::make('text', 'mmwpwadisableincustomposttype', 'Disable in Custom Post Type')
                ->set_classes('mmwpwalogoandotherstylingsep-child')
                ->set_help_text('Ketikn nama custom post type yang ingin di disable, contoh: product, portfolio, dll. Di pisahkan dengan koma jika lebih dari satu')
                ->set_width(33),


            //=========================open chat text=========================
            Field::make('text', 'mmwaopentxt', 'Open Chat Text')
                ->set_default_value('Open Chat')
                ->set_help_text('Text to show when chat is closed')
                ->set_width(50)
                ->set_classes('mmwpwalogoandotherstylingsep-child'),

            //=========================close chat text=========================
            Field::make('text', 'mmwpwaclosetxt', 'Close Chat Text')
                ->set_default_value('Close Chat')
                ->set_help_text('Text to show when chat is opened')
                ->set_width(50)
                ->set_classes('mmwpwalogoandotherstylingsep-child'),

            /**
             *=========================
             *Staff Complex
             *=========================
             */

            Field::make('separator', 'mmwpwastaffsep', 'Staff')
                ->set_classes('mmwacbseparator mmwpwastaffsep'),

            Field::make('complex', 'mmwpwaitems', 'Staff')
                ->set_layout('tabbed-horizontal')
                ->set_classes('mmwpwastaffsep-child')
                ->add_fields([

                    //=========================staff status=========================
                    Field::make('checkbox', 'mmwpwastaffstatus', 'Disable Staff Full')
                        ->set_option_value('yes')
                        ->set_default_value(false)
                        ->set_help_text('Check this to disable staff full'),


                    //=========================checkbox enabling schedule by hour=========================
                    Field::make('checkbox', 'mmwpwadisablestaffbyhourstatus', 'Enabling to Disabled Staff by Hour')
                        ->set_option_value('yes')
                        ->set_default_value(false)
                        ->set_help_text('Check this to disable staff by hour')
                        ->set_conditional_logic([
                            [
                                'field' => 'mmwpwastaffstatus',
                                'value' => false,
                            ],
                        ]),
                    //=========================@todo complex disable staff by hour=========================
                    Field::make('complex', 'mmwpwadisablestaffbyhour', 'Disable Staff by Hour')
                        ->set_classes('mmwpwafieldhead1')
                        ->set_conditional_logic([
                            [
                                'field' => 'mmwpwadisablestaffbyhourstatus',
                                'value' => true,
                            ],
                        ])
                        ->add_fields([
                            //=========================Disable Staff by Hour From=========================
                            Field::make('text', 'mmwpwadisablestafffrom', 'Disable Staff From - until')
                                ->set_attribute('placeholder', '01-08')
                                ->set_help_text('Disable Staff berdasarkan jam, ketik misal: 01-08 untuk disable staff mulai jam 01 sampai jam 08 WIB atau 12-13 untuk disable staff mulai jam 12 sampai jam 13 WIB dst')
                                ->set_default_value('01-08')
                                ->set_width(50),
                        ]),

                    //=========================upload photo=========================
                    Field::make('image', 'mmwpwastaffphoto', 'Staff Photo')
                        ->set_value_type('url')
                        ->set_help_text('Upload your staff photo here, size recommended 50x50px tanpa warna background')
                        ->set_width(33),

                    //=========================staff name=========================
                    Field::make('text', 'mmwpwastaffname', 'Staff Name')
                        ->set_classes('StaffName')
                        ->set_help_text('Staff Name')
                        ->set_width(33),

                    //=========================staff job e.g customer service, support etc=========================
                    Field::make('text', 'mmwpwastaffjob', 'Staff Job')
                        ->set_help_text('Staff Job')
                        ->set_help_text('Staff Job: e.g customer service, support, billing, periklanan etc')
                        ->set_width(33),

                    //=========select staff job: chat only, call only, chat and call ======
                    Field::make('select', 'mmwpwastafftask', 'Staff Job')
                        ->add_options([
                            'chatandcall' => 'Chat and Call',
                            'chatonly' => 'Chat Only',
                            'callonly' => 'Call Only',
                        ])
                        ->set_help_text('Select Staff Job')
                        ->set_default_value('chatandcall'),

                    //=========================whatsapp number=========================
                    Field::make('text', 'mmwpwachatnumber', 'Whatsapp Number')
                        ->set_help_text('Whatsapp Number misal: 0813-9891-2341')
                        ->set_conditional_logic([
                            'relation' => 'OR',
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatonly',
                            ],
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatandcall',
                            ],
                        ])
                        ->set_width(50),

                    //=========================phone number=========================
                    Field::make('text', 'mmwpwacallnumber', 'Call Number')
                        ->set_help_text('Call Number misal: 0813-9891-2341')
                        ->set_conditional_logic([
                            'relation' => 'OR',
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'callonly',
                            ],
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatandcall',
                            ],
                        ])
                        ->set_width(50),



                    //=========================Custom wa text messages=========================
                    Field::make('text', 'mmwpwacustomwamessagestext', 'Standard Custom Whatsapp Text')
                        ->set_help_text('Custom Whatsapp Text')
                        ->set_help_text('Contoh: Halo%20nama%20domain%20anda%20disini <span class="mmwpwared mmwpwabold">Note: pisahkan spasi dengan %20</span>')
                        ->set_attribute('placeholder', 'Halo%20nama%20domain%20anda%20disini')
                        ->set_conditional_logic([
                            // create conditional logic for, if staff task is chat only or chat and call and mmwpwaincludeposttitle is not checked.
                            'relation' => 'OR',
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatonly',
                            ],
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatandcall',
                            ]
                        ]),

                    //=========================checkbox untuk sertakan post title=========================
                    Field::make('checkbox', 'mmwpwaincludeposttitle', 'Aktifkan Include Post Title')
                        ->set_option_value('yes')
                        ->set_help_text('<span class="mmwpwared mmwpwabold">Note: ini hanya berjalan pada taxonomy post saja (tidak include category dan tag)</span>. Pesan pada taxonomy category dan tag akan tetap menggunakan pesan yang Anda ketikan pada "Standard Custom Whatsapp Text".')
                        ->set_conditional_logic([
                            'relation' => 'OR',
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatonly',
                            ],
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatandcall',
                            ],
                        ]),

                    //=========================input message untuk wa with post title=========================
                    Field::make('text', 'mmwpwacustomwamessagestextwithposttitle', 'Custom Pesan Text Sebelum Post Title')
                        ->set_help_text('Custom Whatsapp Text with Post Title')
                        ->set_help_text('Contoh cukup Anda ketikan misalnya: <span class="mmwpwabold">Halo%20saya%20ingin%20bertanya%20tentang%20</span> karena <span class="mmwpwabold">Judul Post</span> akan ditambahkan otomatis diakhir kata yang Anda ketikan. <span class="mmwpwared mmwpwabold">Silahkan gunakan kalimat Anda sendiri yang terpenting adalah gunakan %20 sebagai spasi.</span>')
                        ->set_default_value('Halo%20saya%20ingin%20bertanya%20tentang%20')
                        ->set_conditional_logic([
                            [
                                'field' => 'mmwpwaincludeposttitle',
                                'value' => true,
                            ]
                        ]),

                    //=========================checkbox untuk sertakan Woocommerce Product Title=========================
                    Field::make('checkbox', 'mmwpwaincludewoocommerceproducttitle', 'Aktifkan Include Product Title (Khusus Woocommerce)')
                        ->set_option_value('yes')
                        ->set_help_text('<span class="mmwpwared mmwpwabold">Note: ini hanya berjalan pada Woocommerce Product saja (tidak include category dan tag)</span>. Pesan pada taxonomy category dan tag akan tetap menggunakan pesan yang Anda ketikan pada "Standard Custom Whatsapp Text".')
                        ->set_conditional_logic([
                            'relation' => 'OR',
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatonly',
                            ],
                            [
                                'field' => 'mmwpwastafftask',
                                'value' => 'chatandcall',
                            ],
                        ]),

                    //=========================input message untuk wa with woocommerce product title=========================
                    Field::make('text', 'mmwpwacustomwamessagestextwithwoocommerceproducttitle', 'Custom Pesan Text Sebelum Product Title (Khusus Woocommerce)')
                        ->set_help_text('Custom Whatsapp Text with Product Title')
                        ->set_help_text('Contoh cukup Anda ketikan misalnya: <span class="mmwpwabold">Halo%20saya%20ingin%20bertanya%20tentang%20produk%20</span> karena <span class="mmwpwabold">Nama Produk</span> akan ditambahkan otomatis diakhir kata yang Anda ketikan. <span class="mmwpwared mmwpwabold">Silahkan gunakan kalimat Anda sendiri yang terpenting adalah gunakan %20 sebagai spasi.</span>')
                        ->set_default_value('Halo%20saya%20ingin%20bertanya%20tentang%20produk%20')
                        ->set_conditional_logic([
                            [
                                'field' => 'mmwpwaincludewoocommerceproducttitle',
                                'value' => true,
                            ]
                        ]),









                ])












            //=========================Fields End=========================






        ]);
}
