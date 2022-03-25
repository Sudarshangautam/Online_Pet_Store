<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $categoryId = $_POST["categoryId"];
        $price = $_POST["price"];

        $sql = "INSERT INTO `product` (`productName`, `productPrice`, `productDesc`, `productCategorieId`, `productPubDate`) VALUES ('$name', '$price', '$description', '$categoryId', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $productId = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'product-'.$productId;
                $newfilename=$newName .".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/OnlinePetStore/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('Product added successfully');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('Failed to add product');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Please select an image file to upload.");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('Failed');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $productId = $_POST["productId"];
        $sql = "DELETE FROM `product` WHERE `productId`='$productId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/OnlinePetStore/img/product-".$productId.".jpg";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Product removed successfully');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('Failed to remove product');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateItem'])) {
        $productId = $_POST["productId"];
        $productName = $_POST["name"];
        $productDesc = $_POST["desc"];
        $productPrice = $_POST["price"];
        $productCategorieId = $_POST["catId"];

        $sql = "UPDATE `product` SET `productName`='$productName', `productPrice`='$productPrice', `productDesc`='$productDesc', `productCategorieId`='$productCategorieId' WHERE `productId`='$productId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Product updated successfully');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Failed to update product');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateItemPhoto'])) {
        $productId = $_POST["productId"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'product-'.$productId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/OnlinePetStore/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Product image updated successfully');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Failed to update product image');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>