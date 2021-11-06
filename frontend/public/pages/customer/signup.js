$(document).ready(function(){
    $(".signup-btn").click(function(){
    setTimeout($('.msg').addClass('.msg-visible'), 500);
    setTimeout($('.msg').removeClass('.msg-visible'), 3000);
    });
});

var databasemail = $row['user_email'];
var input_mail = $_POST['email'];

if (databasemail == input_mail) {
  function myFunction() {
      // Get the toast DIV
      var x = document.getElementById("msg");
    
      // Add the "visible" class to DIV
      x.className = "msg-visible";
    
      // After 3 seconds, remove the visible class from DIV
      setTimeout(function(){ x.className = x.className.replace("msg-visible", ""); }, 3000);
  }
}

function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");
  
    // Add the "show" class to DIV
    x.className = "show";
  
    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
