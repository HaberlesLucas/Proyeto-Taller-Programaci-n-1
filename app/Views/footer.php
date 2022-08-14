<div class="container">
  <div class="containerProductos">
    <footer class="bg-black text-white">
    <a href="https://www.valordolarblue.com.ar/" class="valordolarblue-widget" data-width="250"
            data-styleblack="true" title="Precio Dolar Blue"><b>Dolar Blue</b></a>
        <script type="text/javascript">
            !function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.async = true;
                    js.src = "//www.valordolarblue.com.ar/static/js/widget.min.js?2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "valordolarblue-widget");
        </script>
      <!-- Grid container -->
      <div class="container p-0 pb-0" id="redes">
          <!--Social media -->
          <section class="mb-4 p-1">
              <!-- Facebook -->
              <a class="btn btn-outline-light btn-floating m-3" style="background-color: #3b5998;"
                  href="https://www.facebook.com/lucas.haberles.9/" role="button"><i
                      class="fab fa-facebook-f"></i></a>
              <!-- Twitter -->
              <a class="btn btn-outline-light btn-floating m-3" style="background-color: #55acee;"
                  href="https://twitter.com/gksOhb_" role="button"><i class="fab fa-twitter"></i></a>
              <!-- Youtube -->
              <a class="btn btn-outline-light btn-floating m-3" style="background-color: #ed302f;"
                  href="https://www.youtube.com/channel/UCInZoh8cOJFTPkaT0BcAYfA" role="button"><i
                      class="fab fa-youtube"></i></a>
              <!-- Instagram -->
              <a class="btn btn-outline-light btn-floating m-3" style="background-color: #c715c7;"
                  href="https://www.instagram.com/haberles_lucas/" role="button"><i
                      class="fab fa-instagram"></i></a>
              <!-- Whatsapp -->
              <a class="btn btn-outline-light btn-floating m-3" style="background-color: #25d366;"
                  href="https://api.whatsapp.com/send/?phone=3777620599&text=Hola%20quisiera%20contactarme%20por%20lo%20sieguiente:"
                  role="button"><i class="fab fa-whatsapp"></i></a>
          </section>
          <!--Social media -->
      </div>

      <div class="ter">
          <p>
              <a href="tercond">
                  <h5">Ver Términos y Condiciones de uso</h5>
              </a>
          </p>
      </div>
        <!-- Copyright -->
      <div class="text-center p-2" style="background-color: black;">© 2022 Copyright:
          <a class="text-white" href="">Haberles Lucas Francisco</a>
      </div>
    </footer>
  </div>
</div>
  <script src="<?php echo base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url("/assets/js/sweetalert.min.js");?>"></script>
  <script src="https://kit.fontawesome.com/14302f62c4.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
  
<!-- MODAL  -->
    <script type="text/javascript">
        function mostrar(e, a, b, c){
            e.preventDefault();
            swal({
                title: a,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }) 
            .then((willDelete) => {
                if (willDelete) {
                    swal(b, {
                    icon: "success",
                    });
                    window.location.href=e.target.parentElement.parentElement.href;
                } else{
                    swal(c);
                    console.log(e.target.parentElement.parentElement.href);
                }
            });
        }
	</script>
</body>

</html>