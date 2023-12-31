<?php
session_start();
if(!file_exists('products.json'))
{
    $data=file_get_contents('https://dummyjson.com/products');
    $file=file_put_contents('products.json',$data);

}
$data=file_get_contents('products.json');
$data=json_decode($data,true);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>products</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

 
  <?php if(isset($_SESSION['success'])):  ?>
     
<div class="alert alert-success" role="alert"> <?php echo $_SESSION['success'];?></div>
 
     
<?php endif;?>
<div class="container">
<td> <a href="cart.php" class="btn btn-success">cart</a><td>
  <table class="table" >
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
    </tr>
  </thead>
  <tbody>
       <?php foreach($data['products'] as $product):?>
    <tr>
      
   
      <td><?php echo $product['id'] ?></td>
      <td><?php echo $product['title'] ?></td>
      <td><?php echo $product['description'] ?></td>
      <td><?php echo $product['price'] ?><td>
      <td> <a href="add_to_cart.php?id=<?php echo $product['id']?>" class="btn btn-primary">add</a><td>
    </tr>

     <?php endforeach;?>
    
  </tbody>
</table>
</div>







  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>