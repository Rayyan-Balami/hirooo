<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webleb</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body style="display:flex; align-items:center; justify-content:center;">
<div class="login-page">
  <div class="form">
    <img src="samriddhi.png" alt="samriddhi school" title="samriddhi school">
    <form action="#"class="login-form" method="post">
      <h2><i class="fas fa-lock"></i> Login</h2>
      <input type="text" placeholder="Username" required />
      <input type="password" placeholder="Password" required/>
      <button type="submit" name="send2">login</button>
      <a class="message" href="forgotPassword.html">Forgot Password ?</a>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });
 </script>
</body>
</html>