            
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="/bootstrap/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>

    <?php if ( ! empty($this->html_page['plugin_js']) ) { ?>
        <?php foreach ( $this->html_page['plugin_js'] as $file ) { ?>
            <script src="<?= $file; ?>.js"></script>
        <?php } ?>
    <?php } ?>

    <?php if ( ! empty($this->html_page['custom_js']) ) { ?>
        <?php foreach ( $this->html_page['custom_js'] as $file ) { ?>
            <script src="<?= $file; ?>.js"></script>
        <?php } ?>
    <?php } ?>
  </body>
</html>
