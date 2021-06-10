<!-- Required Jquery -->
<script type="text/javascript" src="/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="/assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="/assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    
    <script src="/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="/assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="/assets/pages/widget/amchart/gauge.js"></script>
    <script src="/assets/pages/widget/amchart/serial.js"></script>
    <script src="/assets/pages/widget/amchart/light.js"></script>
    <script src="/assets/pages/widget/amchart/pie.min.js"></script>
    <!-- menu js -->
    <script src="/assets/js/pcoded.min.js"></script>
    <script src="/assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="/assets/js/script.js "></script>
    
    
<script>
//deletar 
    
function deleta(url) {
      Swal.fire({
          title: 'Tem Certeza?',
          text: "Esta ação não pode ser desfeita!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim, Deletar!'
      }).then((result) => {
          console.log(result)
          if (result.isConfirmed) {
            window.location.href = url
               Swal.fire(
                   'Deletado!',
                   'O registro foi deletado!',
                   'success'
               )
          }
      })
  }

  //salvar
  function salvar(url) {
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Salvo com sucesso!',
  showConfirmButton: false,
  timer: 1500
})
  } 

</script>
<script src="{{ asset('/vendor/sweetalert/sweetalert.all.js') }}"
@include('sweetalert::alert')> 
</script>


    
</body>

</html>