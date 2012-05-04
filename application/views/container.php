<?php if( !isset( $container ) ) $container = 'home';  ?>

<?php include('template/header.php'); ?>

<?php include( $container.'.php'); ?>

<?php if( isset( $sidebar ) ) include( $sidebar.'.php');  ?>

<?php include('template/footer.php'); ?>