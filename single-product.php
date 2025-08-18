<?php get_header() ?>
<div id="single-product">
  <div class="max-w-screen-lg mx-auto">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
    ?>
        <main id="main" class="site-main">
          <div class="flex gap-3 max-w-screen-lg mx-auto mt-10">
            <div class="w-1/4">
              <div class="bg-white rounded-xl overflow-hidden border border-gray-300 p-4">
                <?php
                $terms = get_the_terms(get_the_ID(), 'product_category');
                $category_name = '';

                if (!is_wp_error($terms) && !empty($terms)) {
                  $category_name = $terms[0]->name;
                }

                if ($category_name) {
                  $related_posts = get_posts([
                    'post_type'      => 'product',
                    'posts_per_page' => 5,
                    'post__not_in'   => [get_the_ID()],
                    'tax_query'      => [
                      [
                        'taxonomy' => 'product_category',
                        'field'    => 'name',
                        'terms'    => $category_name,
                      ],
                    ],
                  ]);

                  if ($related_posts) {
                    echo '<h3 class="text-black font-bold mb-3">محصولات مشابه</h3>';
                    echo '<ul>';
                    foreach ($related_posts as $post) {
                      setup_postdata($post);
                      echo '<li class="flex items-center py-2 border-b border-gray-200 last:border-b-0">';
                      echo '<a href="' . get_the_permalink() . '" class="flex px-1">';
                      echo get_the_post_thumbnail($post, 'thumbnail', ['class' => 'w-12 h-12 object-cover']);
                      echo '<span class="text-gray-600 pr-3">' . get_the_title() . '</span>';
                      echo '</a>';
                      echo '</li>';
                    }
                    echo '</ul>';
                    wp_reset_postdata();
                  } else {
                    echo '<p>محصول مشابهی وجود ندارد.</p>';
                  }
                }
                ?>
              </div>


            </div>

            <div class="w-3/4">
              <div class="rounded-xl overflow-hidden shadow-sm h-48 sm:h-64 md:h-80 lg:h-100 bg-white">
                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-contain']); ?>
              </div>


              <div class="flex justify-between my-5">
                <div>
                  <h7 class="font-bold"><?php the_title() ?></h7>
                </div>
                <?php
                $price = get_post_meta(get_the_ID(), 'price', true);
                $oldPrice = get_post_meta(get_the_ID(), 'old_price', true);
                ?>
                <div class=" flex items-center">
                  <?php
                  if ($oldPrice > 0 && $price > 0) {
                    $off = round((($oldPrice - $price) / $oldPrice) * 100);
                    echo "<div class='bg-red-600 rounded-lg text-white px-2 ml-7'>$off%</div>";
                  }
                  ?>
                  <div class="line-through text-gray-400 ml-3"><?= number_format($oldPrice) ?></div>
                  <div class="ml-3"><?= number_format($price) ?></div>
                  <p class="text-gray-500 text-xs pt-1 ">تومان</p>

                </div>

              </div>
              <div class="mt-3 text-sm leading-7 text-gray-600">
                <?php the_content(); ?>
              </div>
              <div class="my-5">
                <a href="<?php the_permalink() ?>" class="bg-blue-400 text-white rounded-lg px-5 py-2">افزودن به سبد</a>
              </div>
              <div class="pt-2 mb-7">
                <h2 class="font-bold text-gray-800 mb-4">ویژگی ها</h2>
                <?php
                $sensorType = get_post_meta(get_the_ID(), 'sensor_type', true);
                $sensorSize = get_post_meta(get_the_ID(), 'sensor_size', true);

                if ($sensorType) {
                  echo "<p>نوع حسگر: " . esc_html($sensorType) . "</p>";
                }
                if ($sensorSize) {
                  echo "<p>قطع حسگر: " . esc_html($sensorSize) . "</p>";
                }
                ?>
              </div>


            </div>


        <?php
      }
    } else {
      echo '<p>No content found.</p>';
    }
        ?>
          </div>
  </div>
  </main>
  <?php get_footer() ?>