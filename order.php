<!DOCTYPE html>
<html>
  <head>
    <title>Order form</title>

    <style>

      html, body {
        background-image:url("logo1.png");
  background-color:#cccccc;
  background-repeat:no-repeat;
  background-position:center;
      height: 100%;
      }
      body, input, select { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #eee;
      }
      h1, h3 {
      font-weight: 400;
      }
      h1 {
      font-size: 32px;
      }
      h3 {
      color: #1c87c9;
      }
      .main-block, .info {
      display: flex;
      flex-direction: column;
      }
      .main-block {
      justify-content: center;
      align-items: center;
      width: 100%; 
      min-height: 100%;
      background-size: cover;
      }
      form {
      width: 80%; 
      padding: 25px;
      margin-bottom: 20px;
      background: rgba(0, 0, 0, 0.9);
      }
      input, select {
      padding: 5px;
      margin-bottom: 20px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #eee;
      }
      option {
      background: black; 
      border: none;
      }
      .metod {
      display: flex; 
      }
      .Payment{
      display: flex; 
      }
      input[type=radio] {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin-right: 20px;
      text-indent: 32px;
      cursor: pointer;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: -1px;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #1c87c9;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 8px;
      height: 4px;
      top: 5px;
      left: 5px;
      border-bottom: 3px solid #1c87c9;
      border-left: 3px solid #1c87c9;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      button {
      display: block;
      width: 200px;
      padding: 10px;
      margin: 20px auto 0;
      border: none;
      border-radius: 5px; 
      background: #1c87c9; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #095484;
      }
      @media (min-width: 568px) {
      .info {
      flex-flow: row wrap;
      justify-content: space-between;
      }
      input {
      width: 46%;
      }
      input.fname {
      width: 100%;
      }
      select {
      width: 48%;
      }
      }
      #home{ 
    width: 75px;
    height: 25px;
    background-color: #4CAF50;
    position:absolute;
    transition: .5s ease;
    top: 5%;
    left: 45%;}
    </style>
  </head>
  <body>
    <input id="home" type="button" onclick="window.location.href = 'index.html';" value="Home">
    <div class="main-block">
      <h1><b>Order Form</b></h1>
      <form method="post" action="order.php">
        <div class="info">
          <input class="fname" type="text" name="name" placeholder="Full name">
          <input type="text" name="email" placeholder="Email">
          <input type="text" name="phoneNumber" placeholder="Phone number">
          <input type="date" name="todayDate" placeholder="Today's date">
          <input type="date" name="dueDate" placeholder="Order due date">

       
        </div>
        <h3>Delivry Metod</h3>
        <div class="metod">
       
          <div> 
            <input type="radio" value="none" id="radioOne" name="deliveryMethod" <?php if (isset($deliveryMethod) && $deliveryMethod=="Pickup") echo "checked";?>/>
            <label for="radioOne" class="radio">For pick up</label>
          </div>
          <div>
            <input type="radio" value="none" id="radioTwo" name="deliveryMethod" <?php if (isset($deliveryMethod) && $deliveryMethod=="Delivery") echo "checked";?>/>
            <label for="radioTwo" class="radio">For delivery</label>
          </div>
        </div>
        <br>

        <h3>Payment</h3>
        <div class="Payment"> 
           <div>
                 <input type="radio" value="none" id="radioThree" name="payment" <?php if (isset($payment) && $payment=="Cash") echo "checked";?>/>
                 <label for="radioThree" class="radio">With cash</label>
            </div>
           <div>
           <input type="radio" value="none" id="radioFour" name="payment" <?php if (isset($payment) && $payment=="Credit") echo "checked";?> />
           <label for="radioFour" class="radio">With credit card</label>
          </div>
        </div>
        


        <button class="button" name="submit" onclick="window.location.href='index.html';">Submit</button>
     
      </form>
    </div>
  </body>
</html>
<?php
    $db = mysqli_connect('localhost','root','','project'); 
        mysqli_select_db($db,'project');
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phoneNumber=$_POST['phoneNumber'];
        $todayDate=$_POST['todayDate'];
        $dueDate=$_POST['dueDate'];
        $deliveryMethod=$_POST['deliveryMethod'];
        $payment=$_POST['payment'];
        

        if($name=='' or $email=='' or $phoneNumber=='' or $todayDate=='' or $dueDate=='' or $deliveryMethod=='' or $payment=='')
        {
            echo"<script>alert('Any input is Empty');</script>";
        }
        else
        {   
          
          $insert="SELECT * FROM store WHERE name='$name' OR email='$email' LIMIT 1";
            $query=mysqli_query($db,$insert);
            
           
            $uploadFile="INSERT INTO store(name,email,phoneNumber,todayDate,dueDate,deliveryMethod,payment)
        VALUES('$name','$email','$phoneNumber','$todayDate','$dueDate','$deliveryMethod','$payment');";
            
                if(mysqli_query($db,$uploadFile))      
                {
                    echo "<script>alert('File is Upload');</script>";
                }
            }
        }
    
?> 









