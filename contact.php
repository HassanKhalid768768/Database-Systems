<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <body>
  <nav class="navbar">
      <div class="container">
        <a href="index.php" class="navbar-brand">MedWeb System</a>
        <div class="navbar-nav">
          <a href="index.php">Home</a>
          <div class="dropdown">
            <button class="dropbtn">Disease</button>
            <div class="dropdown-content">
              <?php
              include "connect.php";
              $sql = "SELECT * FROM category";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<a href="category.php?category_id=' . $row["category_id"] . '">' . $row["category_name"] . '</a>';
                }
              } else {
                echo "<p>No categories found.</p>";
              }
              mysqli_close($conn);
              ?>
            </div>
          </div>
          <a href="contact.php">Contact</a>
          <a href="about.php">About</a>
          <a href="login.php">Login</a>
        </div>
      </div>
    </nav>  
</body>
</html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<div class='form-overlay'></div>
<div class='icon fa fa fa-envelope' id='form-container'>
  <span class='icon fa fa-close' id='form-close'></span>
  <div id='form-content'>
    <div id='form-head'>
      <h1 class='pre'>Get in touch</h1>
      <p class='pre'>Cotact Us...</p>
      <h1 class='post'>Thanks!</h1>
      <p class='post'>I'll be in touch ASAP</p>
    </div>
    <form>
      <input class='input name' name='name' placeholder='Your name' type='text'>
      <input class='input email' name='email' placeholder='contact email' type='text'>
      <select class='input select' name='subject'>
        <option disabled=''>What shall we talk about?</option>
        <option selected=''>Will we add more cures?</option>
        <option>About a Query</option>
        <option>About any complaint</option>
      </select>
      <textarea class='input message' placeholder='How can I help?'></textarea>
      <input class='input submit' type='submit' value='Send Message'>
    </form>
  </div>
</div>
<script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail() {
            Email.send({
                Host: "smtp.gmail.com",
                Username: "luffysama402@gmail.com",
                Password: "supersaiyan2",
                To: 'luffysama402@gmail.com',
                From: document.getElementById("email").value,
                Subject: "New Contact Form for Enquiry",
                Body: "And this is the body"
            }).then(
                message => alert(message)
            );
        }
    </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="function.js"></script>
<script>
    
var formContainer = $('#form-container');

bindFormClick();
//Opening the form
function bindFormClick(){
  $(formContainer).on('click', function(e) {
    e.preventDefault();
    toggleForm();
    //Ensure container doesn't togleForm when open
    $(this).off();
  });
}

//Closing the form
$('#form-close, .form-overlay').click(function(e) {
  e.stopPropagation();
  e.preventDefault();
  toggleForm();
  bindFormClick();
});

function toggleForm(){
  $(formContainer).toggleClass('expand');
  $(formContainer).children().toggleClass('expand');
  $('body').toggleClass('show-form-overlay');
  $('.form-submitted').removeClass('form-submitted');
}

//Form validation
$('form').submit(function() {
  var form = $(this);
  form.find('.form-error').removeClass('form-error');
  var formError = false;
  
  form.find('.input').each(function() {
    if ($(this).val() == '') {
      $(this).addClass('form-error');
      $(this).select();
      formError = true;
      return false;
    }
    else if ($(this).hasClass('email') && !isValidEmail($(this).val())) {
      $(this).addClass('form-error');
      $(this).select();
      formError = true;
      return false;
    }
  });
  
  if (!formError) {
    $('body').addClass('form-submitted');
    $('#form-head').addClass('form-submitted'); 
    setTimeout(function(){
      $(form).trigger("reset");
    }, 1000);
  }
  return false;
});

function isValidEmail(email) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(email);
};
</script>