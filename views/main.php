<?php require_once 'templates/header.php'; ?>
        <?php foreach ( $this->modules as $module ) : ?>
            <div class="tab-pane fade<?php echo $module === current( $this->modules ) ? ' show active' : ''; ?>" id="<?php echo esc_attr( $module['pane'] ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $module['id'] ); ?>_tab" tabindex="0">
                <?php $this->load_module( $module['id'] ); ?>
            </div>
        <?php endforeach ?>
<?php require_once 'templates/footer.php'; ?>