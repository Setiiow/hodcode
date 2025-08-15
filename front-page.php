<?php get_header()?>
<div id="page" class="min-h-screen">
  <div class="max-w-screen-lg mx-auto flex gap-2 py-6">
    <?php
    $terms=get_terms([
      'taxonomy'=>'product_category',
      'hide_empty'=>false
    ]);
    foreach ($terms as $term) {
    ?>
   
      <a href="<?= get_term_link($term) ?>" class="mr-2 rounded-full text-gray-600 bg-white border-1 border-gray-400 px-2 items-center hover:bg-blue-400 hover:border-blue-400 hover:text-white pb-1 "><?= $term->name ?></a>
      <?php
      }
      ?>
  </div>
  <main id="main" class="site-main">
    <div class="max-w-screen-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-auto">
      <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();
      ?>
      <div class="bg-white mx-2 my-2 rounded-xl overflow-hidden flex flex-col justify-between">
        <?php the_post_thumbnail()?>
        <h7 class="font-bold mx-5"><?php the_title()?></h7>
        <?php
          $terms = get_the_terms( get_the_ID(), 'product_category' );
          if ($terms[0])
            echo "<div class='text-gray-400 mx-5'>".$terms[0]->name."</div>";
        ?>
       <?php 
          $price = get_post_meta(get_the_ID(), 'price', true);
          $oldPrice = get_post_meta(get_the_ID(), 'old_price', true);
        ?>
        <div class="flex gap-2 my-3 mx-5">
          <?php
            if($oldPrice>0 && $price>0)
              {
                $off = round((($oldPrice-$price) / $oldPrice) * 100);
                echo "<div class='bg-red-600 rounded-lg text-white px-2'>$off%</div>";
              }
          ?>
          <div class="line-through mr-10 text-gray-400" ><?=number_format($oldPrice)?></div>
          <div><?=number_format($price)?></div>
          <p class="text-gray-500 text-xs pt-1">تومان</p>
        </div>

        <div class="flex gap-2 justify-center p-4">
            <a href="<?php the_permalink() ?>" class="bg-blue-400 text-white rounded-lg px-5 py-1">افزودن به سبد</a> 
            <a href="<?php the_permalink() ?>" class="bg-gray-100 text-gray-500 rounded-lg px-5 py-1">مشاهده جزئیات</a>
        </div>
      </div>
    <?php 
      }
      } else {
        echo '<p>No content found.</p>';
      }
    ?>
    </div>
  </main> 
</div>
<?php get_footer()?>

