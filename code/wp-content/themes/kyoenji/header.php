<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold"><a href="<?php echo home_url(); ?>" class="text-white"><?php bloginfo('name'); ?></a></h1>
            <nav><?php wp_nav_menu(['theme_location' => 'primary', 'menu_id' => 'primary-menu']); ?></nav>
        </div>
    </header>
    <main class="container mx-auto py-8">
