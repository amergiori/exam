<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="leads.php">Leads</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Sign Out</a>
      </li>
    <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Sign In</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>