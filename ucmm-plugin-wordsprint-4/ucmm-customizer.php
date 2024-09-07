<?php

// Register customizer settings
add_action('customize_register', 'ucmm_customize_register');
function ucmm_customize_register($wp_customize) {
    // Add a section for Social Accounts
    $wp_customize->add_section('ucmm_social_accounts', array(
        'title'    => __('Add Social Accounts', 'ucmm'),
        'priority' => 30,
    ));

    // Predefine 5 social media slots (adjust this number as needed)
    for ($i = 1; $i <= 5; $i++) {
        // Text field for social link
        $wp_customize->add_setting("ucmm_social_link_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("ucmm_social_link_$i", array(
            'label'    => __("Social Icon Link $i", 'ucmm'),
            'section'  => 'ucmm_social_accounts',
            'settings' => "ucmm_social_link_$i",
            'type'     => 'url',
        ));

        // File upload input for social icon image
        $wp_customize->add_setting("ucmm_social_icon_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "ucmm_social_icon_$i", array(
            'label'    => __("Social Icon Image $i", 'ucmm'),
            'section'  => 'ucmm_social_accounts',
            'settings' => "ucmm_social_icon_$i",
        )));

        // Color picker for background color
        $wp_customize->add_setting("ucmm_social_color_$i", array(
            'default'   => '#ffffff',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "ucmm_social_color_$i", array(
            'label'    => __("Social Icon Background Color $i", 'ucmm'),
            'section'  => 'ucmm_social_accounts',
            'settings' => "ucmm_social_color_$i",
        )));
    }

    // Add Text Section for Footer
    $wp_customize->add_section('ucmm_text_section', array(
        'title'    => __('Text Section', 'ucmm'),
        'priority' => 35,
    ));

    // Add a text editor for the footer content
    $wp_customize->add_setting('ucmm_footer_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('ucmm_footer_text', array(
        'label'    => __('Footer Text', 'ucmm'),
        'section'  => 'ucmm_text_section',
        'type'     => 'textarea',
    ));

    // Add a color picker for the footer text color
    $wp_customize->add_setting('ucmm_footer_color', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ucmm_footer_color', array(
        'label'    => __('Footer Text Color', 'ucmm'),
        'section'  => 'ucmm_text_section',
        'settings' => 'ucmm_footer_color',
    )));
}
