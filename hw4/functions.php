<?php
require_once ('dbconfig.php');

//////////////////////check photo
function checkphoto($photo) {
    $ext = pathinfo($photo, PATHINFO_EXTENSION);
    $uploaddir = 'photos/';
    $photo = md5(basename($photo));
    $uploadfile = $uploaddir . $photo . '.' . $ext;
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
        resizephoto($uploadfile,$ext);
        return $uploadfile;
    } else {
        echo "Не удалось загрузить файл.\n";
    }
    return $uploadfile;
};

//////////////////////resize photo
function resizephoto($uploadfile,$ext) {
    $size=GetImageSize($uploadfile);
    switch ($ext) {
        case ('jpg' || 'jpeg'):
            $ext = 'JPEG';
            break;
        case 'png':
            $ext = 'PNG';
            break;
        case 'gif':
            $ext = 'GIF';
            break;
    }
    $createfrom = 'ImageCreateFrom' . $ext;
    $src=$createfrom($uploadfile);
    $iw=$size[0];
    $ih=$size[1];
    $koe=$iw/150;
    $new_h=ceil($ih/$koe);
    $dst=ImageCreateTrueColor (150, $new_h);
    ImageCopyResampled ($dst, $src, 0, 0, 0, 0, 150, $new_h, $iw, $ih);
    ImageJPEG ($dst, $uploadfile, 100);
    imagedestroy($src);
}

//////////////////////select users
function select_users($db) {
    $q = $db->query("SELECT * FROM users");
    $users = $q->fetchall();
    return $users;
}
////////////////////////calc age from from birthday
function calc_age($db,$userlogin) {
    $q = $db->query("SELECT age FROM users WHERE login= '$userlogin'");
    $age = $q->fetch();
    $birthday = strtotime($age['age']);
    $age = date('Y') - date('Y', $birthday);
    if (date('md', $birthday) > date('md')) {
        $age--;
    }
    return $age;
}
//////////////////////select login
function select_login($db,$login) {
    $q = $db->query("SELECT * FROM users WHERE login='$login'");
    $user = $q->fetch();
    return $user;
}
//////////////////////select password
function select_password($db,$login) {
    $q = $db->query("SELECT password FROM users WHERE login='$login'");
    $password = $q->fetch();
    return $password;
}
function IsRegister($db,$login){
    $q = $db->query("SELECT login FROM users WHERE login='$login'");
    $login = $q->fetch();
    if ($login) {
        header("Location: /reg.php");
        exit;
    }
};
function remove_photo($db,$user) {
    $query = "UPDATE users SET photo = '' WHERE login = '$user'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $db->exec($query);
};
function new_user($db,$login,$hash,$name,$age,$description,$filepath) {

    $stmt = $db->prepare('INSERT INTO users (login,password,name,age,description,photo) VALUES (?,?,?,?,?,?)');
    $stmt->execute(array($login,$hash,$name,$age,$description,$filepath));
}
//////////////////////delete user
function remove_user ($db,$user) {
    $query = "DELETE FROM users WHERE login = '$user'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $db->exec($query);
    header( "Location: list.php");
}