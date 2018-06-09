


<iframe src="http://www.skrill.com/payment-form?email=<?php echo $email ?>&fname=<?php echo $FirstName ?>&lname=<?php echo $LastName ?>&address=<?php echo $Address ?>&address2=<?php echo $Address2 ?>&city=<?php echo $City ?>&postal_code=<?php echo $PostalCode ?>&country=<?php echo $CountryId ?>&state=<?php echo $State ?>" name="payment" height="600" width="610" border="0">
 </iframe>


<form action="https://www.skrill.com/app/payment.pl" method="post" target="_self">
<input type="hidden" name="pay_to_email" value="ayodejisamuelfakunle@skrill.com">
<input type="hidden" name="transaction_id" value="A10005">
<input type="hidden" name="return_url" value="http://www.moneybookers.com/payment_made.html">
<input type="hidden" name="cancel_url" value="http://www. moneybookers.com/payment_cancelled.html">
<input type="hidden" name="status_url" value="https://www. moneybookers.com/process_payment.cgi">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="merchant_fields" value="customer_number, session_id">
<input type="hidden" name="customer_number" value="C1234">
<input type="hidden" name="session_ID" value="A3DFA2234">
<input type="hidden" name="pay_from_email" value="payer@skrill.com">
<input type="hidden" name="amount2_description" value="Product Price:">
<input type="hidden" name="amount2" value="29.90">
<input type="hidden" name="amount3_description" value="Handling Fees & Charges:">
<input type="hidden" name="amount3" value="3.10">
<input type="hidden" name="amount4_description" value="VAT (20%):">
<input type="hidden" name="amount4" value="6.60">
<input type="hidden" name="amount" value="39.60">
<input type="hidden" name="currency" value="GBP">
<input type="hidden" name="firstname" value="John">
<input type="hidden" name="lastname" value="Payer">
<input type="hidden" name="address" value="Payerstreet">
<input type="hidden" name="postal_code" value="EC45MQ">
<input type="hidden" name="city" value="Payertown">
<input type="hidden" name="country" value="GBR">
<input type="hidden" name="detail1_description" value="Product ID:">
<input type="hidden" name="detail1_text" value="4509334">
<input type="hidden" name="detail2_description" value="Description:">
<input type="hidden" name="detail2_text" value="Romeo and Juliet (W. Shakespeare)">
<input type="hidden" name="detail3_description" value="Special Conditions:">
<input type="hidden" name="detail3_text" value="5-6 days for delivery">
<input type="hidden" name="confirmation_note" value="Sample merchant wishes you pleasure reading your new book!">
<input type="submit" value="Pay!">
</form>


<html>
<head>
<title>MoneyBookers by WebSpeaks.in</title>
</head>
<body>
<?php
//$email = $_GET['email'];
//$fname = $_GET['fname'];
//$address = $_GET['address'];
//$address = $_GET['address'];
//$address2 = $_GET['address2'];
//$city = $_GET['city'];
//$postal_code = $_GET['postal_code'];
//$country = $_GET['country'];
//$state = $_GET['state'];

//$price = 10;
?>
<!-- 
<iframe src="http://yoursite.com/payment-form?email=<?php echo $email ?>&fname=<?php echo $FirstName ?>&lname=<?php echo $LastName ?>&address=<?php echo $Address ?>&address2=<?php echo $Address2 ?>&city=<?php echo $City ?>&postal_code=<?php echo $PostalCode ?>&country=<?php echo $CountryId ?>&state=<?php echo $State ?>" name="payment" height="600" width="610" border="0">
 </iframe> -->

<form action="https://www.skriil/app/payment.pl" target="_self" name="payment_form">

 <input type="hidden" name="pay_to_email" value="your_merchant_email"> 
 <input type="hidden" name="pay_from_email" value="<?php echo $email ?>">
 <input type="hidden" name="return_url" value="http://yoursite.com/payment_success.php"> <!-- URL to redirect after payment success -->
 <input type="hidden" name="cancel_url" value="http://yoursite.com/payment_cancel.php">  <!-- URL to redirect after payment cancel -->
 <input type="hidden" name="status_url" value="http://yoursite.com/payment_status.php"> <!-- URL to get the payment response (not visible to user, called on backend) -->
 <input type="hidden" name="language" value="EN"> <!-- Language of payment -->

 <input type="hidden" name="hide_login" value="1">  <!-- Whether to show the tiny login form with the payment form, no in our case -->

 <!-- Specifies a target in which the return_url value will be called upon successful payment from customer.  -->
 <!-- 1 = '_top', 2 = '_parent', 3 = '_self', 4= '_blank' -->
 <input type="hidden" name="return_url_target" value="1">  
 <input type="hidden" name="cancel_url_target" value="1"> 

 <!-- Custom fields for your own needs -->
 <input type="hidden" name="merchant_fields" value="name, username, order_amount, user_id"> <!-- List all your custom fields here (comma separated, max 5)-->
 <input type="hidden" name="name" value="<?php echo $fname. ' '.$lname ?>"> <!-- Value of Custom 'name' -->
 <input type="hidden" name="username" value="<?php echo $username ?>">  <!-- Value of Custom 'username' -->
 <input type="hidden" name="order_amount" value="<?php echo $price ?>"> <!-- Value of Custom 'order_amount' -->
 <input type="hidden" name="user_id" value="<?php echo $user_id ?>">  <!-- Value of Custom 'user_id' -->

 <input type="hidden" name="amount_description" value="Testing Amount">  <!-- Description of the amount -->
 <input type="hidden" name="amount" value="<?php echo $price ?>">  <!-- Amount to be charged -->
 <input type="hidden" name="currency" value="GBP">   <!-- Currency of payment -->
 <input type="hidden" name="firstname" value="<?php echo $fname ?>">   <!-- Firstname of buyer, need for autofilling -->
 <input type="hidden" name="lastname" value="<?php echo $lname ?>">    <!-- Lastname of buyer, need for autofilling -->
 <input type="hidden" name="email" value="<?php echo $email ?>">    <!-- Email of buyer, need for autofilling -->
 <input type="hidden" name="address" value="<?php echo $address ?>">     <!-- Address of buyer, need for autofilling -->
 <input type="hidden" name="city" value="<?php echo $city ?>">     <!-- City of buyer, need for autofilling -->
 <input type="hidden" name="state" value="<?php echo $state ?>">     <!-- State of buyer, need for autofilling -->
 <input type="hidden" name="postal_code" value="<?php echo $postal_code ?>">     <!-- Postal_code of buyer, need for autofilling -->
 <input type="hidden" name="country" value="<?php echo $country ?>">     <!-- Country code of buyer, need for autofilling -->
 <input type="hidden" name="detail1_description" value="New Product">      <!-- Description heading of the payyment, shown after payment has been made -->
 <input type="hidden" name="detail1_text" value="<?php echo $product ?>">      <!-- Detailed description of the payment, shown after payment has been made -->
 <input type="hidden" name="confirmation_note" value="Thanks for purchasing Voodoo Video!"> <!-- Confirmation message to be shown after payment has been made --> 

 <p>
  <input type="submit" value="submit"> 

