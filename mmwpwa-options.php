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

            //=========================seperator=========================
            Field::make('separator', 'mmwpwapaoptionsep', 'Options')
                ->set_classes('mmwacbSeparator'),

            //=========================checkbox to enabling mmwpwa=========================
            Field::make('checkbox', 'mmwpwastatus', 'Enable WP WA')
                ->set_option_value('yes')
                ->set_default_value(false),


            //=========================styling options=========================

            Field::make('separator', 'mmwpwastylingsep', 'Styling')
                ->set_classes('mmwacbSeparator'),

            //=========================select style =========================
            Field::make('select', 'mmwpwastyle', 'Select Style')
                ->add_options([
                    'style1' => 'Style 1',
                    'style2' => 'Style 2',
                    'style3' => 'Style 3',
                    'style4' => 'Style 4',
                    'style5' => 'Style 5',
                    'style6' => 'Style 6',
                    'style7' => 'Style 7',
                    'style8' => 'Style 8',
                    'style9' => 'Style 9',
                    'style10' => 'Style 10',
                ])
                ->set_help_text('Select Style for your Whatsapp box'),

            /**
             *=========================
             *Container Option
             *=========================
             */

            //=========================color container background=========================
            Field::make('color', 'mmwpwacontainerbg', 'Container Background Color')
                ->set_default_value('#eeeeee'),

            /**
             *=========================
             *top section option
             *=========================
             */

            Field::make('separator', 'mmwpwatopstylingsep', 'Top Element Styling')
                ->set_classes('mmwacbSeparator'),


            //=========================top background color=========================
            Field::make('color', 'mmwpwatopbg', 'Top Background Color')
                ->set_default_value('#01A356')
                ->set_width(50),
            //=========================top text color=========================
            Field::make('color', 'mmwpwatoptext', 'Top Text Color')
                ->set_default_value('#ffffff')
                ->set_width(50),

            /**
             *=========================
             *NAME Bottom section option
             *=========================
             */

            Field::make('separator', 'mmwpwabottomstylingsep', 'Bottom Element Styling')
                ->set_classes('mmwacbSeparator'),

            //=========================bottom bg color=========================
            Field::make('color', 'mmwpwabottombg', 'Bottom Background Color')
                ->set_default_value('#f5deb3'),


            /**
             *=========================
             *Item Styling Options
             *=========================
             */
            Field::make('separator', 'mmwpwaitemstylingsep', 'Chat Item Styling')
                ->set_classes('mmwacbSeparator'),

            //=========================item bg color=========================
            Field::make('color', 'mmwpwaitembg', 'Item Background Color')
                ->set_default_value('#eeeeee')
                ->set_width(50),
            //=========================item text color=========================
            Field::make('color', 'mmwpwaitemtext', 'Item Text Color')
                ->set_default_value('#000000')
                ->set_width(50),


            /**
             *=========================
             *NAME Chat Button Styling
             *=========================
             */

            Field::make('separator', 'mmwpwabuttonstylingsep', 'Chat Button Styling')
                ->set_classes('mmwacbSeparator'),

            //=========================Chat button bg color=========================
            Field::make('color', 'mmwpwabuttonwabg', 'Chat Button Background Color')
                ->set_default_value('#01A356')
                ->set_width(33),

            //=========================Chat button text color=========================
            Field::make('color', 'mmwpwabuttonwatext', 'Chat Button Text Color')
                ->set_default_value('#ffffff')
                ->set_width(33),

            //=========================chat text========================
            Field::make('text', 'mmwpwabuttonwachattxt', 'Chat Button Text')
                ->set_default_value('Chat Now')
                ->set_width(33),


            /**
             *=========================
             *NAME Chat Button Styling
             *=========================
             */

            //=========================Call button bg color=========================
            Field::make('color', 'mmwpwabuttoncallbg', 'Call Button Background Color')
                ->set_default_value('#8B0000')
                ->set_width(33),

            //=========================Call button text color=========================
            Field::make('color', 'mmwpwabuttoncalltext', 'Call Button Text Color')
                ->set_default_value('#ffffff')
                ->set_width(33),

            //=========================Call text========================
            Field::make('text', 'mmwpwabuttoncalltxt', 'Call Button Text')
                ->set_default_value('Call Now')
                ->set_width(33),

            /**
             *=========================
             *logo option, open chat text option, close chat text option
             *=========================
             */

            Field::make('separator', 'mmwpwalogoandotherstylingsep', 'Logo and other options')
                ->set_classes('mmwacbSeparator'),

            //=========================logo=========================
            Field::make('image', 'mmwpwalogo', 'Logo')
                ->set_value_type('url')
                ->set_help_text('Upload your logo here, size recommended 50x50px tanpa warna background'),

            //=========================open chat text=========================
            Field::make('text', 'mmwaopentxt', 'Open Chat Text')
                ->set_default_value('Open Chat')
                ->set_help_text('Text to show when chat is closed')
                ->set_width(50),

            //=========================close chat text=========================
            Field::make('text', 'mmwpwaclosetxt', 'Close Chat Text')
                ->set_default_value('Close Chat')
                ->set_help_text('Text to show when chat is opened')
                ->set_width(50),

            /**
             *=========================
             *Staff Options
             *=========================
             */

            Field::make('complex', 'mmwpwaitems', 'Staff')
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

                    Field::make('complex', 'mmwpwadisablestaffbyhour', 'Disable Staff by Hour')
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







                ])












            //=========================Fields End=========================






        ]);
}
