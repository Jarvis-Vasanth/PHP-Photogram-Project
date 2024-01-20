<?php

$login = true;
Session::set('mode', 'web');
if(isset($_POST['email_address']) and isset($_POST['password'])) {
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];

    $result = UserSession::authenticate($email_address, $password);
    $login = false;
}
if (!$login) {
    if ($result) {
        ?>
    <script>window.location.href = "<?=get_config('base_path')?>"</script>

    <?php } else {
        ?>

<main class="container">
  <div class="bg-light p-5 rounded mt-3">
    <h1>Login Failed</h1>
    <p class="lead">This example is a quick exercise to do basic login with html forms.</p>
</div>
</main>

<?php
    }
} else {
    ?>

<main class="form-signin">
<form method="post" action="login.php">
    <img class="mb-4" src="http://eecs.qmul.ac.uk/media/eecs/ioc/IoC_Logo_OnWhite_AW_large.jpg" alt="" height="80">
    <input name="fingerprint" type="hidden" id="fingerprint" value="">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


<?php } ?>