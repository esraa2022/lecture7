<?php
session_start();
$id= $_GET['id'];

$item=$_SESSION['cart'][$id];

if($item['qty']>1)
{
 $item['qty']= $item['qty']-1;
 $_SESSION['cart'][$id]=$item;

}
else
{
    unset($_SESSION['cart'][$id]);

}

$_SESSION['success']="product deleted from cart : ".$product['title'];
header('location:cart.php');
die;

?>
