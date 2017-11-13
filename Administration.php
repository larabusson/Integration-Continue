<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/home.css" rel="stylesheet">
  <link href="css/Admin.css" rel="stylesheet">

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="images/logoISIMA.png" alt="logoISIMA">
    </div>
    <div class="col-md-8">
        <a href="home.php"><h1>ZZagenda</h1></a>    </div>
    <div class="col-md-2">
      <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Langues
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="#" title="Lien 1">Francais</a></li>
          <li><a href="#" title="Lien 2">English</a></li
          </ul>
      </div>
    </div>
  </div>

</div>
      <div class="container">
          <a href="./Ajout.html"><h2>Administration</h2><button type="button" class="btn add btn-outline-primary"> + ADD</button></a>
            <table class="table table-striped">
                  <thead>
                      <tr>
                        <th>Title <i class="fa fa-clock-o" aria-hidden="true"></i></th>
                        <th>Location</th>
                        <th>Topic</th>
                        <th>Author</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                      </tr>
                      <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                      </tr>
                      <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                      </tr>
                  </tbody>
            </table>
      </div>



<footer class="container-fluid text-center">
  <div class="row">
    <div class="col-md-4">
      <button type="button" class="btn btn-link">Administrateur</button>
    </div>
    <div class="col-md-4">
      <button type="button" class="btn btn-link">Ajout Conference</button>
    </div>
    <div class="col-md-4">
      <a href="./login.html"><button type="button" class="btn btn-link">Sign in
      </button></a>
    </div>
</footer>

</body>
</html>
