  </main>

  <!-- jquery cdn link   --> 
  <script src="assets/js/jquery-3.7.1.min.js"></script> 
  
  <!-- magnifier popup js cdn link -->
  <script src="assets/js/jquery.magnific-popup.js"></script>

  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- custom js -->
  <script src="assets/js/custom.js"></script>
  <script defer src="assets/js/sideBar.js"></script>

  <script>
    if( $('.alert').hasClass("showAlert")){
      setTimeout(function(){
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
      },5000);
    }

    $('.close-btn').click(function(){
      $('.alert').removeClass("show");
      $('.alert').addClass("hide");
    });
  </script>

  <script>
    function hideShowDiv(val){
      if(val ==1){
        document.getElementById('div').style.display='none';
        document.getElementById('check_display').style.display='block';
        document.getElementById('imageUploaded').textContent="Upload Image";
        document.getElementById('input_link').required = false;
      }
      if(val ==2){
        document.getElementById('div').style.display='grid';
        document.getElementById('check_display').style.display='none';
        document.getElementById('imageUploaded').textContent="Upload Video Cover Image";
        document.getElementById('input_link').required = true;
      }
    }
  </script>
 
  <script> 
    $('.imageLB').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom',
        zoom: {
          enabled: true,
          duration: 300,
          easing: 'ease-in-out',
        }
    });
  </script>

</body>
</html>