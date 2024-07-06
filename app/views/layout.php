<html>

  <head>
    <title><?= $title = 'Georgy layout';
        $this->e($title)?></title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  </head>

<body>

<nav>
    <ul>
        <li><a href="/home">Homepage</a></li>
        <li><a href="/about">About</a></li>

    </ul>
</nav>

<?=$this->section('content')?>

</body>

</html>

