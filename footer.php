<footer class="py-4 mt-auto relative border-gray-300 border-opacity-50 border-t-1 max-w-screen-lg mx-auto">

  <div class="mb-6 w-[800px] mx-auto flex justify-between items-center mt-4">

    <div class="footer-logo">
      <?php
      if (function_exists('the_custom_logo')) {
        the_custom_logo();
      }
      ?>
    </div>


    <div class="footer-text text-center flex-grow">
      <p class="text-gray-700">
      <p>©کلیه حقوق این سایت برای پارت محفوظ می باشد.</p>
      </p>
    </div>


    <div class="footer-empty w-24">
      <div class="flex gap-3">
        <a href="https://twitter.com" target="_blank" class="w-8 h-6 flex items-center justify-center rounded-full bg-white border border-gray-400 text-black hover:bg-gray-100">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://instagram.com" target="_blank" class="w-8 h-6 flex items-center justify-center rounded-full bg-white font-bold border border-gray-400 text-black hover:bg-gray-100">
          in
        </a>
        <a href="https://facebook.com" target="_blank" class="w-8 h-6 flex items-center justify-center rounded-full bg-white font-bold border border-gray-400 text-black hover:bg-gray-100">
          f
        </a>
      </div>
    </div>
  </div>

  <?php wp_footer(); ?>
</footer>