<?php
session_start();
$id= $_GET['id'];
$data=file_get_contents('products.json');
$data=json_decode($data,true)['products'];
$product=$data[$id-1];

if(isset($_SESSION['cart'][$product['id']]))
{
 $item=$_SESSION['cart'][$product['id']];
 $item['qty']= $item['qty']+1;
 $_SESSION['cart'][$product['id']]=$item;

}
else
{
    $product['qty']=1;
    $_SESSION['cart'][$product['id']]=$product;
}
$_SESSION['success']="product added to cart : ".$product['title'];
header('location:index.php');
die;

?>
