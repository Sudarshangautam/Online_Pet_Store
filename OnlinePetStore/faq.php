<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>FAQ</title>
    <link rel = "icon" href ="img/logo1.jpg" type = "image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="CSS/faq.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/nav.css">
    <link rel="stylesheet" type="text/css" href="CSS/footer.css">

  </head>
  <body>
  <?php include 'partials/_dbconnect.php';?>
  <?php include 'partials/_nav.php';?>

  <div class="faqs-container">
      <br>
      <h2>Frequently Asked Questions</h2>
      <hr>
      <br>

      <div class="questions-container">
        <div class="content-container">
          <div class="faq-header">
            <h3>How can I make an order ?</h3>
            <span class="open active">+</span>
            <span class="close">-</span>
          </div>

          <div class="content">
            <p>
             We accept the both online and cash on delivery method.
            </p>

            <p>
              You have to make the payment before hand, if you are intrested in online method. But in case you feel better on the payment after the receive of product, you can choose cash on delivery method.
            </p>
          </div>
        </div>

        <div class="content-container">
          <div class="faq-header">
            <h3>In how many days did I get the orders ?</h3>
            <span class="open active">+</span>
            <span class="close">-</span>
          </div>

          <div class="content">
            <p>
              Normally, it will takes maximum 4-5 days. But incase if the delivery boy is on leave, it can takes more time. 
            </p>
          </div>
        </div>

        <div class="content-container">
          <div class="faq-header">
            <h3>Can I return the product if there consist any damages?</h3>
            <span class="open active">+</span>
            <span class="close">-</span>
          </div>

          <div class="content">
            <p>
              Yes, you can.
            </p>

            <p>
             But you should return the product within 2 days of delivery. After 2 days, it will not be returned.
            </p>
          </div>
        </div>
      </div>
    </div>
   <br>

  <?php include 'partials/_footer.php';?> 

  <script src="assets/js/faq.js"></script>
</body>