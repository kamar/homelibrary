<?php
    session_start();
    require_once '../ics/head.php';
    echo "<h1>Εκδότες</h1>";
    echo "<div id=\"our-books\">";
        require '../dist/php/publishers.php';
    echo "</div>";
?>
<script src="/dist/scroll.js"></script>
</dody>
</html>
?>