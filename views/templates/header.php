<div class="container-fluid py-4">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php foreach ( $this->modules as $module ) : ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo $module === current( $this->modules ) ? 'active' : ''; ?>" id="<?php echo esc_attr( $module['id'] ); ?>" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr( $module['pane'] ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $module['pane'] ); ?>" aria-selected="<?php echo $module === current( $this->modules ) ? 'true' : 'false'; ?>"><?php echo esc_html( $module['name'] ); ?></button>
            </li>
        <?php endforeach; ?>
    </ul>