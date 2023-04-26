<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
        /* desktop styles */
body{
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
}

.my-form {
  display: flex;

  flex-direction:column;
  width: 45%;
  padding: 10px 20px;
  justify-content:center;
  align-items: center;
  background: rgba( 255, 255, 255, 0.55 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 5px );
-webkit-backdrop-filter: blur( 5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}

.my-form label {
  width: 100%;
  margin-right: 10px;
  font-size: 20px;
  font-weight: 600;
  text-align:center;
}

.my-form input {
  width: 100%;
  padding: 5px;
  min-height: 60px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

.my-form button {
  padding: 10px 20px;
  background-color:#38B64A;
  color: #fff;
  border: 1px solid #ffffff;

  margin-top: 10px;
  min-width: 100px;
  border-radius: 5px;
  cursor: pointer;
    font-size: 26px;
}

.my-form button:hover {
  background-color: #ffffff;
  border: 1px solid #38B64A;
    color: #000000;
transition: 0.5s ease;
}

/* mobile styles */
@media (max-width: 767px) {
  .my-form {
    flex-direction: column;
    justify-content: center;
  }
  
  .my-form label, .my-form input {
    width: 100%;
    margin-bottom: 10px;
    text-align: left;
  }
}
</style>
  </head>
  <body>
  <form action="stkpush.php" method="POST" class="my-form">
    <h1>Make Ticket Payment</h1>
    <img src="assets/logo.png" alt="MPESA" width="300" height="160">
  <label for="money">Enter amount of money:</label>
  <input type="number" id="money" name="money" required>

  <label for="phone">Enter phone number:</label>
  <input type="tel" id="phone" name="phone" placeholder=" Format 2547....." required>

  <button type="submit">Pay Now</button>

  <p>Complete the transaction by entering your pin on the prompt sent to your phone</p>
</form>

    
  </body>
</html>