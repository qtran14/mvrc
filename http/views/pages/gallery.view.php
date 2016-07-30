<div class="header-content">
    <h2><i class="fa fa-file-o"></i>Gallery</h2>
</div>

<div class="body-content animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <p>
            <?php
                $count = 0;
                $break_count = 7;
                foreach ( $data['images'] as $image ) {
            ?>
                    <a class="fancybox-button" rel="fancybox-thumb" href="/galleries/images/large/<?= $image['name']; ?>" title="<?= $image['uploaded_name']; ?>">
                        <img src="/galleries/images/thumbnail/<?= $image['name']; ?>" alt="" />
                    </a>

            <?php
                    $count++;

                    if ( $count % $break_count == 0 ) {
                        echo '<p></p>';
                    }
                }
            ?>
            </p>
        </div>
    </div>
</div>
