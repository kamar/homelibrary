
    <?php
        // TODO: Formating.
        session_start();
        require_once '../ics/head.php';
        echo "<h1>Συγγραφείς</h1>";
        echo "<div id=\"our-books\">";
            require '../dist/php/authors.php';
        echo "</div>";
    ?>
<script src="/dist/scroll.js"></script>
</dody>
</html>