<?php

// Social icons settings callback
function ucmm_social_icons_callback() {
    $icons = get_option('ucmm_social_icons', []);
    if (!empty($icons)) {
        foreach ($icons as $icon) {
            echo '<input type="url" name="ucmm_social_icons[]" value="' . esc_url($icon) . '" />';
            echo '<br>';
        }
    }
    echo '<input type="button" id="add_new_icon" value="Add New Icon" />';
}

// Display social icons on the maintenance page
function ucmm_display_social_icons() {
    $icons = get_option('ucmm_social_icons', []);
    if (!empty($icons)) {
        echo '<ul>';
        foreach ($icons as $icon) {
            echo '<li><a href="' . esc_url($icon) . '"><img src="' . esc_url($icon['icon_image']) . '" alt="social-icon"></a></li>';
        }
        echo '</ul>';
    }
}
