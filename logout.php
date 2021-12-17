<?php
session_start();
include("koneksi.php");
$_SESSION['username'] == "";
session_unset();
session_destroy();

?>
<script language="javascript">
    document.location = "index.php";
</script>