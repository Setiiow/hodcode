<?php

// use Automattic\WooCommerce\Internal\ProductDownloads\ApprovedDirectories\Register;

 get_header()?>
<div id="page" class="min-h-screen flex flex-col">
  <?php
  $terms=get_terms([
    'taxonomy'=>'product_category',
    'hide_empty'=>false
  ]);
  // print_r($terms);
  ?>
   <main id="main" class="site-main w-[800px] mx-auto py-6">
            <?php
        if (have_posts()) {
        while (have_posts()) {
          the_post();
          the_title('<h2>', '</h2>');
          the_excerpt();
          the_post_thumbnail();
        }
      } else {
        echo '<p>No content found.</p>';
      }
      
      ?>
      
    </main>
  <?php get_footer()?>
</div>
