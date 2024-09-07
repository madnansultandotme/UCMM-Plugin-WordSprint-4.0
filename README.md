# UCMM Plugin Wordsprint 4

### A Customizable WordPress Maintenance Mode Plugin

---

## Table of Contents

1. [Description](#description)
2. [Features](#features)
3. [Installation](#installation)
4. [Usage Instructions](#usage-instructions)
5. [Customization via Customizer](#customization-via-customizer)
   - [Social Media Icons](#social-media-icons)
   - [Footer Text](#footer-text)
6. [File Structure](#file-structure)
7. [FAQs](#faqs)
8. [Team](#team)

---

## Description

**UCMM Plugin Wordsprint 4** is a WordPress plugin designed to help website administrators display a fully customizable maintenance page for specific pages or posts. The plugin integrates seamlessly with the WordPress Customizer, allowing users to add social media icons, customize the footer text, and control the design of the maintenance page. 

This plugin is perfect for websites that want to put certain pages or posts under maintenance without taking down the entire site.

---

## Features

- **Maintenance Mode**: Enable maintenance mode for specific pages or posts.
- **Custom Social Media Icons**: Add up to 5 social media icons with customizable links, images, and background colors.
- **Custom Footer Text**: Add customizable footer text (e.g., copyright information) with editable font color.
- **Full-Screen, Responsive Design**: The maintenance page covers the full screen and is responsive on all devices.
- **WordPress Customizer Integration**: Manage the maintenance page options, social icons, and footer text directly through the WordPress Customizer.

---

## Installation

### Step-by-Step Installation:

1. **Download the Plugin**:
   - Download the plugin's ZIP file from the repository.

2. **Upload the Plugin to WordPress**:
   - In your WordPress Admin Dashboard, navigate to **Plugins > Add New**.
   - Click on **Upload Plugin** at the top of the page.
   - Choose the downloaded ZIP file and click **Install Now**.

3. **Activate the Plugin**:
   - Once the installation is complete, click on **Activate Plugin**.

4. **Customize the Maintenance Page**:
   - After activation, go to **Appearance > Customize** to configure the maintenance page, social icons, and footer text.

---

## Usage Instructions

### Setting Up Maintenance Mode:

1. After activating the plugin, navigate to **Appearance > Customize**.
2. In the Customizer, go to the **"Add Social Accounts"** and **"Text Section"** options to configure the maintenance page.
3. Go to your admin panel settings to select specific pages or posts to enable **maintenance mode**.

### How to Put Specific Pages or Posts Under Maintenance:

1. Go to **Settings > Maintenance Mode** (specific to this plugin) in the WordPress dashboard.
2. Select the pages or posts you wish to put into maintenance mode.
3. Once selected, visitors to those pages will see the maintenance page instead of the usual content.

---

## Customization via Customizer

The plugin provides easy customization options via the WordPress Customizer.

### Social Media Icons

1. Navigate to **Appearance > Customize**.
2. Go to the **Add Social Accounts** section.
3. You can configure up to 5 social media icons by entering:
   - **Link**: The URL for the social media platform (e.g., https://twitter.com).
   - **Icon Image**: Upload the social media icon (e.g., Twitter logo).
   - **Background Color**: Choose a background color for each icon.

### Footer Text

1. Navigate to **Appearance > Customize**.
2. Go to the **Text Section**.
3. Enter the footer text, such as copyright information.
4. Choose a font color for the footer text using the color picker.

---

### Description of Key Files:
- **`ucmm-plugin-wordsprint-4.php`**: The main file that initializes the plugin and includes dependencies.
- **`ucmm-customizer.php`**: Handles Customizer options for social media icons and footer text.
- **`includes/ucmm-maintenance.php`**: Manages maintenance mode logic.
- **`includes/ucmm-settings.php`**: Provides settings to select pages or posts for maintenance mode.
- **`includes/ucmm-social-icons.php`**: Logic for displaying and managing social media icons on the maintenance page.
- **`templates/maintenance-page.php`**: Template for rendering the maintenance page layout.

---

## FAQs

#### 1. **How do I enable maintenance mode for specific pages or posts?**
Go to the **plugin settings** in the admin dashboard and select the pages or posts you want to put under maintenance mode.

#### 2. **How do I add more social media icons?**
By default, the plugin supports up to 5 social media icons. If you need to add more, you can modify the code in the `ucmm-customizer.php` file.

#### 3. **Can I customize the style of the maintenance page?**
Yes, the maintenance page's layout and design can be modified in the `templates/maintenance-page.php` file.

#### 4. **How do I change the footer text?**
Go to **Appearance > Customize > Text Section** and update the footer text. You can also change the font color from the same section.

#### 5. **Can I customize the background color of the social media icons?**
Yes, you can set the background color for each social media icon in the **Customizer > Add Social Accounts** section.

---

## Team

- **Muhammad Adnan Sultan** - Team  Lead, Developer
- **Umar Farooq** - Developer
- **Abdul Manan** - Developer
- **Safeena Akhter** - Developer, Documentation
- **Moizah Kafayat** - Documentation
-  **Muqadas Zahra** - Tester

---
