<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Οικιακή Βιβλιοθήκη</title>
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="stylesheet" href="/dist/style.css">
  </head>
  <?php
      $status = $_SERVER['REDIRECT_STATUS'];
      $codes = array(
            403 => array('403 Forbidden', 'The server has refused to fulfill your request.'),
            404 => array('404 Not Found', 'The document/file requested was not found on this server.'),
            405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
            408 => array('408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
            500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
            502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
            504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
      );

      $title = $codes[$status][0];
      $message = $codes[$status][1];
      if ($title == false || strlen($status) != 3) {
            $message = 'Please supply a valid status code.';
      }
  ?>
<!-- Insert headers here -->
<body>

  <div class="error">
    <h1>Hm!!! Something went wrong.</h1>
    <?php
      echo '<h2>'.$title.'</h2>
      <p>'.$message.'</p>';
    ?>
      <a href="http://homelibrary.me">Μετακινηθείτε στην αρχική σελίδα.</a>
  </div>
  </body>
</html>