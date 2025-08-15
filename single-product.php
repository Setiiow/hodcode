<?php get_header()?>
<div id="single-product">
    <div class="max-w-screen-lg mx-auto">
        <?php
            if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
        <main id="main" class="site-main">
        <div class="flex max-w-screen-lg mx-auto mt-10">
            <div class="w-1/4">
                
            </div>
            <div class="w-3/4 rounded-xl overflow-hidden">
            <div>
                
                <?php the_post_thumbnail()?>
            </div>
            <div class="flex my-5">
                    <h7 class="font-bold mx-5"><?php the_title()?></h7>
                    <?php
                        $price = get_post_meta(get_the_ID(), 'price', true);
                        $oldPrice = get_post_meta(get_the_ID(), 'old_price', true);
                    ?>
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
<?php get_footer()?>
