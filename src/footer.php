    </div><!-- .container -->

    <div class="footer-container">
      <div class="container text-center">
        &copy; <?php _e('All rights reserved', 'wp-theme-starter-kit'); ?>
        <?php echo date('Y'); ?>
        <a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
      </div>
    </div><!-- .footer-container -->

    <script>
      <?php /* windows phone ie bootstrap fix */ ?>
      if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
          document.createTextNode(
            '@-ms-viewport{width:auto!important}'
          )
        )
        document.querySelector('head').appendChild(msViewportStyle)
      }
    </script>

    <?php wp_footer(); ?>
  </body>
</html>
