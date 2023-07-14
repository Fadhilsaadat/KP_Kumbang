<header class="p-3 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div>
        <i id="menu-btn" class="bi bi-list"></i>
      </div>
      <div class="title col-lg-auto me-lg-auto justify-content-center">
        <h3 class="fw-bold mt-2"><?= @$title ? @$title : '' ?></h3>
      </div>
      <div class="dropdown text-end">
        <?php if (logged_in()) : ?> <!-- Cek apakah pengguna sudah login -->
          <a href="/login" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i>
            Hi, <?= user()->fullname ?>
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        <?php else : ?>
          <a href="/logout" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i>
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="/login">Login</a></li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>

<script>
  $(document).ready(function() {
    $('#menu-btn').click(function() {
      $('#menu').toggleClass("active");
    });
  });
</script>