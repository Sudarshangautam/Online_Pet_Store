<?php
include '_dbconnect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if(isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        // Check whether this item exists
        $existSql = "SELECT * FROM `viewcart` WHERE productId = '$itemId' AND `userId`='$userId'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Item Already Added.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $sql = "INSERT INTO `viewcart` (`productId`, `itemQuantity`, `userId`, `addedDate`) VALUES ('$itemId', '1', '$userId', current_timestamp())"; 
              $sql1="INSERT INTO `payment` (`productId`, `itemQuantity`,`userId`, `status`,`orderDate`) VALUES ('$itemId', '1', '$userId', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $result1=mysqli_query($conn, $sql1);
            if ($result){
                echo "<script>alert('Product successfully added to the cart');
                    window.history.back(1);
                    </script>";
            }
        }
    }
 
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `productId`='$itemId' AND `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Product removed successfully');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['checkout'])) {
        $amount = $_POST["amount"];
        $address= $_POST["address"];
       
        $phone = $_POST["phone"];
       
        $password = $_POST["password"];
       
        
        $passSql = "SELECT * FROM users WHERE id='$userId'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        $userName = $passRow['username'];
        if (password_verify($password, $passRow['password'])){ 
            $sql = "INSERT INTO `orders` (`userId`, `address`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES ('$userId', '$address', '$phone', '$amount', '0', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $orderId = $conn->insert_id;
            if ($result){
                $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'"; 
                $addResult = mysqli_query($conn, $addSql);
                while($addrow = mysqli_fetch_assoc($addResult)){
                    $productId = $addrow['productId'];
                    $itemQuantity = $addrow['itemQuantity'];
                    $itemSql = "INSERT INTO `orderitems` (`orderId`, `productId`, `itemQuantity`) VALUES ('$orderId', '$productId', '$itemQuantity')";
                    $itemResult = mysqli_query($conn, $itemSql);
                }
                $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
                $deleteresult = mysqli_query($conn, $deletesql);
                echo '<script>alert("Thanks for ordering with us. ");
                    window.location.href="http://localhost/OnlinePetStore/index.php";  
                    </script>';
                    exit();
            }
        } 
        else{
            echo '<script>alert("Incorrect Password! Please enter correct Password.");
                    window.history.back(1);
                    </script>';
                    exit();
        }    
    }



   


    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $productId = $_POST['productId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `productId`='$productId' AND `userId`='$userId'";
        $updatesql1 = "UPDATE `payment` SET `itemQuantity`='$qty' WHERE `productId`='$productId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
        $updateresult1 = mysqli_query($conn, $updatesql1);
    }
    
}
?>