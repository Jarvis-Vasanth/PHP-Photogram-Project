<?php
include 'libs/load.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php load_template('_head'); ?>

<body>
    <?php
    Session::start();
    if (Session::get('session_token')) {
        $token = Session::get('session_token');
        if (UserSession::authorize($token)) {
    ?>

            <main>
                <?php load_template('_calltoaction'); ?>
                <?php load_template('_photogram'); ?>
            </main>

            <?php load_template('_footer');
        }
    } else {
        ?>
        <script>
            window.location.href = "<?= get_config('base_path') ?>login.php"
        </script>
    <?php
    }
    ?>
    <script src="/photogram/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
