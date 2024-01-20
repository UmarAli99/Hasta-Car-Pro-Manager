<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasta Car Pro | Payment Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    #payment-form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div id="payment-form">
    <h1>Dummy Payment Page</h1>
    <label for="card-number">Card Number:</label>
    <input type="text" id="card-number" placeholder="Enter card number">

    <label for="expiry-date">Expiry Date:</label>
    <input type="text" id="expiry-date" placeholder="MM/YY">

    <label for="cvc">CVC:</label>
    <input type="text" id="cvc" placeholder="Enter CVC">

    <button id="pay-button">Pay Now</button>
  </div>
  <script>
    // You can add some JavaScript here to simulate payment success
    document.getElementById('pay-button').addEventListener('click', function () {
      alert('Payment successful! This is a dummy payment page.');
      // Redirect to the previous page
      window.history.back();
    });
  </script>
</body>
</html>
