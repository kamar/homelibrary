
    <?php
    // Shows the authors.
        $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
        // TODO: Formating.
        session_start();
        require_once $DOCUMENT_ROOT.'/ics/head.php';
        echo "<h1>Συγγραφείς</h1>";
        echo "<div id=\"our-books\">";
            require '../dist/php/authors.php';
        echo "</div>";
    ?>
<script src="/dist/scroll.js"></script>
</dody>
</html>