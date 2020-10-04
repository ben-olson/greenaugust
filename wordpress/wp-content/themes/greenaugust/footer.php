

    </div>
    <div class="footer">

      <div class="footer-wrapper menu">
        <!-- <?php wp_nav_menu( array(
          'theme_location' => 'social-media',
          'items_wrap' => '%3$s',
          'menu_class' => 'icons'
        )); ?> -->
        <div class="copyright">&copy; Brooke Kaufman 2020</div>
        <br>
        <?php wp_nav_menu( array(
          'theme_location' => 'footer-menu',
          'items_wrap' => '%3$s',
          'menu_class' => 'footer-btns'
        )); ?>
        <div class="btn" id="top-btn"><a href="#top">Top</a></div>
      </div>

    </div>

  </body>

</html>
