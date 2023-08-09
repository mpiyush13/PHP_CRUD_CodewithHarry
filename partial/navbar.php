

<?php 
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
   $loggedin=true;
   
 }else{
    $loggedin=false;
 }

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/Php_Test">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">';
     if($loggedin==false)
     {
       echo '<li class="nav-item active">
        <a class="nav-link" href="/Php_Test/signup.php">Signup <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Php_Test/login.php">Login</a>
      </li>';
     }
      

      if($loggedin){
        echo '<li class="nav-item">
        <a class="nav-link" href="/Php_Test/logout.php">Logout</a>
      </li>';
      }
      
   echo '</ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>';

?>