<?php
SESSION_START();
include 'connection.php';
include 'temp/head.php';
$submit=$_POST['Submit1'];
$id=$_POST['id'];
$name=$_POST['name'];
$image=$_POST['image'];
$quantity=$_POST['quantity'];
if (isset($submit)) {
    if(isset($_SESSION['cart'][$id]))
    {
        $previous=$_SESSION['cart'][$id]['quantity'];
        $_SESSION['cart'][$id]=array(
            'id' => $id,
            'name' => $name,
            'image' => $image,
            'quantity' =>$previous+$quantity
    
        );
    }
   else
   {
    $_SESSION['cart'][$id] = array(
        'id' => $id,
        'name' => $name,
        'image' => $image,
        'quantity' => $quantity

    );
   }
}
?>
<script type="text/javascript">
window.history.back();
</script>