<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../src/stylesheets/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <footer id="footer" class="py-2 px-5">
      <div class="row">
        <div class="col-3 contact">
          <h3><u>Contact Us</u></h3>
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <a class="nav-link p-0 text-muted" href="mailto:e.petmart@gmail.com">
                <i class="far fa-envelope"></i> e.petmart@gmail.com
              </a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link p-0 text-muted" href="tel:+6012-3456789">
                <i class="fab fa-whatsapp"></i> +6012-3456789
              </a>
            </li>
          </ul>
        </div>

        <div class="col-3 info-links">
          <ul class="nav flex-column margin-top">
            <li class="nav-item mb-2"><a href="../customer/T&C.php" class="nav-link p-0 text-muted">Terms and condition</a></li>
          </ul>
        </div>

        <div class="col-6">
          <img class="rounded float-right mr-5 footer-img" src="../../images/footer_gif" alt="" style="width:150px;height:150px;">
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <p>&copy; 2021 EPM. All rights reserved.</p>
      </div>
    </footer>
    <script>
      // Responsive website functionality
      $(window).on('resize', function() {
        if($(window).width() <= 768) {
        $('.contact').addClass('col-lg-4 text-center mt-3');
        $('.contact').removeClass('col-3');
        $('.info-links ul').removeClass('margin-top');
        $('.info-links').addClass('col-lg-4 text-center');
        $('.info-links').removeClass('col-3');
      }else{
        $('.contact').addClass('col-3');
        $('.contact').removeClass('col-lg-4 text-center mt-3');
        $('.info-links ul').addClass('margin-top');
        $('.info-links').addClass('col-3');
        $('.info-links').removeClass('col-lg-4 text-center');
        }
      });

      if($(window).width() <= 768) {
        $('.contact').addClass('col-lg-4 text-center mt-3');
        $('.contact').removeClass('col-3');
        $('.info-links ul').removeClass('margin-top');
        $('.info-links').addClass('col-lg-4 text-center');
        $('.info-links').removeClass('col-3');
      }else{
        $('.contact').addClass('col-3');
        $('.contact').removeClass('col-lg-4 text-center mt-3');
        $('.info-links ul').addClass('margin-top');
        $('.info-links').addClass('col-3');
        $('.info-links').removeClass('col-lg-4 text-center');
      }
    </script>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>