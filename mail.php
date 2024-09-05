<?php
SESSION_START();
include 'connection.php';

// Validate reCAPTCHA box 
if (isset($_POST['g-recaptcha-response'])) {
    // Google reCAPTCHA API secret key 
    $secretKey = '6LdMVJUfAAAAAOgOww8QHYP61vVAhfEjDvnUZb7S';

    // Verify the reCAPTCHA response 
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);

    // Decode json data 
    $responseData = json_decode($verifyResponse);

    // If reCAPTCHA response is valid 
    if ($responseData->success === true) {
        // Posted form data 
        $a = $_GET['id'];
        if ($a == 1) {
            if (isset($_POST['name']))
                $name = $_POST['name'];
            if (isset($_POST['require']))
                $require = $_POST['require'];
            if (isset($_POST['email']))
                $email = $_POST['email'];
            if (isset($_POST['address']))
                $address = $_POST['address'];
            if (isset($_POST['num']))
                $num = $_POST['num'];

            $subject = "
<html>
<head></head>
<body>
    <h3>Parts Buyer</h3>
    <p>Name:  $name</p>
    <p>Telephone: $num</p>
    <p>Email: $email</p>
    <h3>Please quote the following:</h3>    
    <table name='contact_seller' style='border-collapse:collapse';> 
        <thead>
        <tr class='>
        <th scope='col'>Id</th>
        <th scope='col'>Name</th>
        <th scope='col'>Image</th>
        <th scope='col'>Quantity</th>
    </tr>   
        </thead>
        <tbody>";
            $id = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $str = $value['image'];
                $image = explode(",", $str);

                $subject .= "<tr>
                                <td>" . $id . "</td>
                                <td>" . $value['name'] . "</td>
                                <td><img src='sub_product/" . $image[0] . " ' style='width:50px'></td>
                                <td><input type='number' name='' class='cart-qty-single' data-item-id='" . $key . "' value='" . $value['quantity'] . "' min='1' max='1000'></td>
                            </tr>";
                $id++;
            }
            $subject .= "</tbody>
    </table>
    <p>End of buyer data report</p> 
    <hr/>     
</body>
</html>";


            // $res = mysqli_query($conn, "INSERT INTO `user`(`user_id`, `user_name`, `email`, `address`, `mobile`,`product`) VALUES ('','$name','$email','$address','$num',' $subject')")
            //  or
            //   die("Query Unsuccessful.");
            $previous = "javascript:history.go(-1)";
            $content = "Name: $name \n Email: $email \n Need A Quotation: $subject \n Number :$num \n Address :$address ";
            $recipient = "vishakhapramodpawar@gmail.com , web@beingaddictive.com";
            $mailheader = "From: $email \r\n";
            mail($recipient, $subject, $content, $mailheader) or die("Error!");
            echo "<script type='text/javascript'>alert('Thank you for visiting our Site!!');document.location='$previous'</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Oops Something went wrong!!');document.location='$previous'</script>";
    }
};
