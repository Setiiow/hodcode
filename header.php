<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body <?php body_class("bg-gray-100 text-gray-600"); ?>>
  <header class="bg-white">
    <div class="max-w-screen-lg mx-auto flex justify-between items-center py-1">
      <div class="flex items-center space-x-6">
        <div class="logo flex">
          <?php
          if (function_exists("the_custom_logo")) {
            the_custom_logo();
          }
          ?>
        </div>

        <div>
          <?php wp_nav_menu([
            'theme_location' => 'menu-right',
            'container' => false,
            'menu_class' => 'flex gap-6',
          ]); ?>

        </div>
      </div>

      <div>
        <?php wp_nav_menu([
          'theme_location' => 'menu-left',
          'container' => false,
          'menu_class' => 'flex gap-6',
        ]); ?>

      </div>
    </div>
  </header>