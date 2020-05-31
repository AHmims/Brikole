<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.cookie = 'name=David';
        });
    </script>
</head>

<body>
    <?php
    var_dump($_COOKIE['name']);
    ?>
    <?php
    // https://stackoverflow.com/a/36245931
    $headerCookies = explode('; ', getallheaders()['Cookie']);
    $cookies = array();
    foreach ($headerCookies as $itm) {
        list($key, $val) = explode('=', $itm, 2);
        $cookies[$key] = $val;
    }
    print_r($cookies["historique"]);
    ?>
</body>

</html>