<?php
    session_start();
    putenv('LC_ALL=de_DE');
    setlocale(LC_MESSAGES, 'de_DE.UTF-8');
    bindtextdomain("homelibrary", "locale");
    textdomain("homelibrary");
    bind_textdomain_codeset("homelibrary", 'UTF-8');
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once $DOCUMENT_ROOT.'/ics/head.php';
    echo "<h1>Μεταφραστές</h1>";
        echo "<div id=\"our-books\">";
            require '../dist/php/translators.php';
        echo "</div>";
    ?>
<script src="/dist/scroll.js"></script>
</dody>
</html>