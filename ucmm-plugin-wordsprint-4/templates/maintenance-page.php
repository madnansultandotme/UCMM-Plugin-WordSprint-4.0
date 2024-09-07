<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Under Maintenance</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            /* height: 100vh; */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .maintenance-container {
            width: 100%;
            height: 100%;
            /* max-width: 1000px;
            min-height: 100vh; */
            background-color: #ffffff; /* Set distinct color */
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }
        h1 {
            color: #ff0000;
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 40px;
        }
        .social-icons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .social-icon {
            display: inline-block;
            padding: 15px;
            border-radius: 50%;
            transition: transform 0.3s;
        }
        .social-icon:hover {
            transform: scale(1.1);
        }
        .social-icon img {
            width: 32px;
            height: 32px;
        }

        /* Footer Section Styling */
        .footer-text {
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff; /* Set distinct color */
            width: 100%; /* Make footer cover full width */
            text-align: center; /* Center align the text */
            border-top: 1px solid #ccc;
            font-size: 14px;
            color: <?php echo esc_attr(get_theme_mod('ucmm_footer_color', '#000000')); ?>;
        }
        .footer-text p {
            margin: 0;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<div class="maintenance-container">
    <h1>Page Under Maintenance</h1>

    <!-- Social Icons Section -->
    <div class="social-icons">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <?php
            $link = get_theme_mod("ucmm_social_link_$i");
            $icon = get_theme_mod("ucmm_social_icon_$i");
            $color = get_theme_mod("ucmm_social_color_$i", '#ffffff');
            if ($link && $icon) :
            ?>
                <a href="<?php echo esc_url($link); ?>" target="_blank" class="social-icon" style="background-color: <?php echo esc_attr($color); ?>;">
                    <img src="<?php echo esc_url($icon); ?>" alt="Social Icon">
                </a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>

    <img src="<?php echo plugin_dir_url(__FILE__) . '../assets/maintenance-image.webp'; ?>" alt="Under Maintenance Image" />
    <p>This page is under maintenance. Please check back later.</p>

    <!-- Footer Text Section -->
    <div class="footer-text">
        <?php echo wp_kses_post(get_theme_mod('ucmm_footer_text', '')); ?>
    </div>
</div>
</body>
</html>
