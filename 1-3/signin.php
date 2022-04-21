<?php


    session_start();
    require_once 'dbconnect.php';

    $login = $_POST['login'];
    $pass = md5(md5($_POST['pass']));

    if (!empty($username) && !empty($password)){
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id_u" => $user['id_u'],
            "login" => $user['login'],
            "email" => $user['email']
        ];

        header('Location: ../enterreg.php');

    } else {
        $check_user = mysqli_query($connect, "SELECT * FROM `admin` WHERE `admin_login` = '$login' AND `admin_pass` = '$pass'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "admi_id" => $user['id_u'],
            "admin_login" => $user['login'],
        ];

        header('Location: ../admin_home.php');
    }
}
}
else {
    $_SESSION['message'] = 'Не верный логин или пароль';
    header('Location: ../login.php');
}
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>