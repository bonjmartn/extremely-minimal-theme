<div class="full-container">

    <footer>

      <div class="page-container">

        <div>
          <?php if ( ! dynamic_sidebar( 'social-icons') ): ?>
            <h3>Social Icons Setup</h3>
            <p>Add the Social Icons widget to this footer section by going to Appearance > Widgets.</p>
          <?php endif; ?>
        </div>

      </div><!-- end of page container -->

        <div class="footer-strip">
          <span id="copyright">&copy; <?php echo date ('Y') ?> <?php bloginfo('name'); ?>  &nbsp; &nbsp; &nbsp; Extremely Minimal Theme by <a href="https://www.zenwebthemes.com/">ZenWebThemes.com</a></span>
        </div>

    </footer>

</div><!-- end of full container -->

<?php wp_footer(); ?>

</body>
</html>