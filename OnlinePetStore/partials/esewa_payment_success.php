<?php
include '_dbconnect.php';
if( isset($_REQUEST['oid']) &&
	isset( $_REQUEST['amt']) &&
	isset( $_REQUEST['refId'])
	)
{
	$sql = "SELECT * FROM product WHERE productId = '".$_REQUEST['oid']."'"	;
	$result = mysqli_query( $conn, $sql);
	if(  $result )
	{

		
		if( mysqli_num_rows($result) == 1)
		{
			$order = mysqli_fetch_assoc( $result);
			$url = "https://uat.esewa.com.np/epay/transrec";
		
			$data =[
			'amt'=> $order['productPrice'],
			'rid'=>  $_REQUEST['refId'],
			'pid'=>  $order['productId'],
			'scd'=> 'epay_payment'
			];

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);
            curl_close($curl);
			$response_code = get_xml_node_value('response_code',$response  );

			if ( trim($response_code)  == 'Success')
			{
				$sql = "UPDATE payment SET status=1 WHERE productId='".$order['productId']."'";
				mysqli_query($conn, $sql);

				$deletesql = "DELETE FROM `viewcart` WHERE `productId`='".$order['productId']."'";   
                $deleteresult = mysqli_query($conn, $deletesql);

                echo '<script>alert("Thank you for purchasing with us. Your payment has been made successfully.");
				window.location.href="http://localhost/OnlinePetStore/index.php"; 
				</script>';
				//echo 'Thank you for purchasing with us. Your payment has been successfully.';
				//header('Location: success.php');
			}
	
	
		}
	}
}


function get_xml_node_value($node, $xml) {
    if ($xml == false) {
        return false;
    }
    $found = preg_match('#<'.$node.'(?:\s+[^>]+)?>(.*?)'.
            '</'.$node.'>#s', $xml, $matches);
    if ($found != false) {
        
            return $matches[1]; 
         
    }	  

   return false;
}