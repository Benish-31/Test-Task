
<?php

include_once "ValidateForm.php";
include_once "Main.php";
$validation = new ValidateForm();
$main = new Main();
if (isset($_POST['Submit'])) {
    $sku = $main->escape_string($_POST['sku']);
    $name = $main->escape_string($_POST['name']);
    $price = $main->escape_string($_POST['price']);
    $size = $main->escape_string($_POST['size']);
    $weight = $main->escape_string($_POST['weight']);
    $height = $main->escape_string($_POST['height']);
    $width = $main->escape_string($_POST['width']);
    $length = $main->escape_string($_POST['length']);
    $dimension = $height . " x " . $width . " x " . $length;
    $errors = $validation->validateForm($_POST, array('sku', 'name', 'price'));
    if ($errors != null) {
        header("Location:ProductForm.php");
        echo $errors;
    } else {
        $result = $main->execute("INSERT INTO product_s (sku,n_ame,price,size,w_eight,dimension) VALUES('$sku','$name','$price','$size','$weight','$dimension')");
        header("Location:index.php");
    }
}
if (isset($_POST['delete'])) {
    $checkbox = $_POST['checkbox'];
    foreach ($checkbox as $id) {
        $result = $main->delete_data($id, 'product_s');
    }
    if ($result) {
        header("Location:index.php");
    }
}
if (isset($_POST['cancel'])) {
    $sku = $name = $price = $size = $weight = $height = $width = $length = '';
    header("Location:index.php");
}
if (isset($_POST['add'])) {
    header("Location:ProductForm.php");
}

?>
