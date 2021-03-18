<?php

session_start();
$_SESSION = [];
session_destroy();
session_unset();

?>
<script>
    window.location.href = '../index.php';
</script>
<?php
exit;
?>