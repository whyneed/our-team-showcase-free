<?php

namespace ots;

?>

<div id="ots" class="grid <?php esc_attr_e( 'col-' . get_option( Options::GRID_COLUMNS ) ); ?>">

    <?php include_once dirname( __FILE__ ) . '/default.php'; ?>

</div>
