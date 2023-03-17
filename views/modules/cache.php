
<div class="row">
  <?php foreach ( $this->views['cache']['test_cases'] as $test_case_id => $test_case ) : ?>
    <div class="col-sm-3 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h6 class="card-subtitle mb-2"><?php echo esc_html( $test_case['name'] ); ?></h6>
        <small class="d-inline-flex px-2 py-1 fw-semibold text-success-emphasis bg-primary-subtle border border-primary-subtle rounded-2" id="<?php echo esc_attr( $test_case_id ) ?>">
            <?php echo $test_case['result'] ? 'Returned True' : 'Returned False';  ?>
        </small>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>