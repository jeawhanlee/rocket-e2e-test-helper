<div class="container-fluid py-4">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php foreach ( $this->modules as $module ) : ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo $module === current( $this->modules ) ? 'active' : ''; ?>" id="<?php echo $module['id']; ?>" data-bs-toggle="tab" data-bs-target="#<?php echo $module['pane'] ?>" type="button" role="tab" aria-controls="<?php echo $module['pane']; ?>" aria-selected="<?php echo $module === current( $this->modules ) ? 'true' : 'false'; ?>"><?php echo $module['name']; ?></button>
            </li>
        <?php endforeach; ?>
    </ul>