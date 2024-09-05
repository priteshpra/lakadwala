<?php
SESSION_START();
include 'connection.php';
if (isset($_POST['g-recaptcha-response']))
{
    // Google reCAPTCHA API secret key 
    $secretKey = '6LdQxiMjAAAAAM7eXIyD4GpoMyDZD5CEn6qWL9uz';

    // Verify the reCAPTCHA response 
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);

    // Decode json data 
    $responseData = json_decode($verifyResponse);

    // If reCAPTCHA response is valid 
    if ($responseData->success === true) {
   
            if (isset($_POST['name']) && isset($_POST['require']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['num']))
            {
                $name = $_POST['name'];
                $require = $_POST['require'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $num = $_POST['num'];
                $select = mysqli_query($conn, "SELECT  `email`,`mobile` FROM `user` WHERE `mobile`='$num'") or exit(mysqli_error($conn));
                if (mysqli_num_rows($select)==0)
                {
                    $query=mysqli_query($conn, "INSERT INTO `user`(`user_name`, `mobile`, `email`, `address`, `position`, `update_on`, `flag`)
                    VALUES ('$name','$num','$email','$address','$require',NOW(),1)") or exit(mysqli_error($conn));
                    if ($query)
                    {
                        foreach ($_SESSION['cart'] as $key => $value)
                        {
                            $str = $value['image'];
                            $image = explode(",", $str);
                            mysqli_query($conn, "INSERT INTO `orders`(`product_name`, `image`, `quantity`, `mobile`, `update_on`, `flag`)
                            VALUES ('$value[name]','$image[0]','$value[quantity]','$num',NOW(),1)");
                            $reply="Successfull";
                        }
                    }
                }else
                    {
                        foreach ($_SESSION['cart'] as $key => $value) 
                        {
                            $str = $value['image'];
                            $image = explode(",", $str);
                            mysqli_query($conn, "INSERT INTO `orders`(`product_name`, `image`, `quantity`, `mobile`, `update_on`, `flag`)
                            VALUES ('$value[name]','$image[0]','$value[quantity]','$num',NOW(),1)");
                            $reply="Successfull";
                        }
                    }
            }
        
            $to = "web@beingaddictive.com";

            $subject = "Quotation Mail sent on ".date('M d, Y', time());

            $message = "Hi, This is a quotation mail";

            $message.= "
            <html>
            <head></head>
            <body>
                <h3>Parts Buyer</h3>
                <p>Name:  $name</p>
                <p>Telephone: $num</p>
                <p>Email: $email</p>
                <h3>Please quote the following:</h3>    
                <table name='contact_seller' style='border-collapse:collapse'; class='border-left'> 
                    <thead>
                    <tr class=''>
                    <th scope='col'>Id</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Image</th>
                    <th scope='col'>Quantity</th>
                    </tr>   
                    </thead>
                    <tbody>";
                        $id = 1;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $str = $value['image'];
                            $image = explode(",", $str);
                            $external_link = 'http://lakadwala.sandvirp.com/sub_product/" . $image[0] . "';
                            if (@getimagesize($external_link)) {
                                $urlimage = $external_link;
                            } else {
                                $urlimage = 'https://cdn.dribbble.com/users/3512533/screenshots/14168376/web_1280___8_4x.jpg';
                            }
                            $message.= "<tr>
                                            <td>" . $id. "</td>
                                            <td>" . $value['name'] . "</td>
                                            <td><img src='".$urlimage."' style='width:50px'></td>
                                            <td>". $value['quantity'] ."</td>
                                        </tr>";
                            $id++;
                        }
                        $message .= "</tbody>
                </table>
                <p>End of buyer data report</p> 
                <hr/>     
            </body>
            </html>";



            $headers = 'From: demo Mail from lakadwala <vishakhapramodpawar@gmail.com>' . "\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $returnpath = '-f vishakhapramodpawar@gmail.com';
            $mail_sent=mail($to,$subject,$message,$headers, $returnpath);


            $previous = "javascript:history.go(-1)";
            echo $mail_sent ?"<script type='text/javascript'>alert('Thank you for visiting our Site!!');document.location='$previous'</script>"
            :"<script type='text/javascript'>alert('Mail Failed');document.location='$previous'</script>";
                            

        }
        else
        {
            $previous = "javascript:history.go(-1)";
            echo"<script type='text/javascript'>alert('Captch Invalid');document.location='$previous'</script>";
        }
}
