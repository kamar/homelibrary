<?php
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once $DOCUMENT_ROOT.'/ics/head.php';
    echo "<h1>Εκδότες</h1>";
    echo "<div id=\"our-books\">";
        require '../dist/php/publishers.php';
    echo "</div>";
?>
<script src="/dist/scroll.js"></script>
</dody>
</html>
?>