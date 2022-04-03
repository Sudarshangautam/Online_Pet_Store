<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#000000">
            <h5 class="modal-title" id="checkoutModal" style="color:#ffffff;" >Enter Your Details:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#ffffff;">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h4>Online Payment: </h4>
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
										<input value="<?php echo $totalPrice; ?>" name="tAmt" type="hidden">
										<input value="<?php echo $totalPrice; ?>" name="amt" type="hidden">
										<input value="0" name="txAmt" type="hidden">
										<input value="0" name="psc" type="hidden">
										<input value="0" name="pdc" type="hidden">
										<input value="epay_payment" name="scd" type="hidden">
                                        <input value="<?php echo $productId; ?>" name="pid" type="hidden">
                                        <input value="http://localhost/OnlinePetStore/partials/esewa_payment_success.php" type="hidden" name="su">
										<input value="http://localhost/OnlinePetStore/partials/esewa_payment_failed.php" type="hidden" name="fu">
										<input type="image" name="esewa-button" src="Images/esewa.png">
				</form>
                <br>
            <form action="partials/_manageCart.php" method="post">
                <h4>Cash on Delivery:</h4>
                <div class="form-group">
                    <b><label for="address">Address:</label></b>
                    <input class="form-control" id="address" name="address" placeholder="Your Exact Location" type="text" required minlength="3" maxlength="500">
                </div>
                
                
                    <div class="form-group ">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon">+977</span>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                  
                <div class="form-group">
                    <b><label for="password">Password:</label></b>    
                    <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21" data-toggle="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    <button type="submit" name="checkout" class="btn btn-success">Confirm</button>
                </div>
              
            </form>
          
        </div>
      
        </div>
    </div>
</div>