<div class="footer">
    <div class="footer-container">
        <div class="left">
            <div class="location">
                <a href="admin/index.php" style="cursor:default"><i class='bx bx-home'></i></a>
                <div>
                    <p>Lebanon</p>
                </div>
            </div>
            <div class="phone">
                <h4><i class='bx bx-phone'></i>+961/ 70-907-215</h4>
            </div>
            <div class="email">
                <h4><i class='bx bx-envelope'></i>daheralaa29@gmail.com</h4>
            </div>
        </div>
        <div class="right">
            <h4>About the company</h4>
            <p>This is me Alaa Daher. CEO & Founder of Alaa Daher Photography. I enjoy discussing new porjects and design challenges.</p>
            <div class="social">
                <a class="media" href="https://www.facebook.com/alaadaherphotoghraphy?mibextid=ZbWKwL"><i class='bx bxl-facebook sm' size="35"></i></a>
                <a class="media" href="mailto:daheralaa29@gmail.com"><i class='bx bxl-gmail sm' size="35"></i></a>
                <a class="media" href="https://instagram.com/alaadaher.photography?igshid=YmMyMTA2M2Y="><i class='bx bxl-instagram-alt sm' size="35"></i></a>               
                <a class="media" href="https://wa.me/+96170907215?text=Hello%2C%20I%20saw%20your%20Portfolio%20and%20I%20am%20interested%20in%20your%20work"><i class='bx bxl-whatsapp sm' size="35"></i></a>
                <a class="media" href="http://tiktok.com/@alaadaherphotography"><i class='bx bxl-tiktok sm' size="35"></i></a>
            </div>
        </div>
    </div>
    <span class="bar"></span>
    <div class="footer-text">
        <p>Copyright &copy; 2023 by <a href="mailto:husdaher579@gmail.com" class="dev_name">Hussein Daher</a> | All Rights Reserved.</p>
    </div>
</div>

<!-- jquery cdn link   --> 
<script src="assets/js/jquery-3.7.1.min.js"></script> 
  
<!-- magnifier popup js cdn link -->
<script src="assets/js/jquery.magnific-popup.js"></script>

<script>
    $('.imageLB').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom',
        zoom: {
          enabled: true,
          duration: 300,
          easing: 'ease-in-out',
        },
        gallery: {
            enabled: true
        }
    });

    $('.videoLB').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        gallery: {
            enabled: true
        }
    });
</script>

<script>
    const allSkeleton =document.querySelectorAll('.skeleton');

    window.addEventListener('load', function(){
        allSkeleton.forEach(item=> {
            item.classList.remove('skeleton')
        });
    });
</script>

<!--custom js-->
<script src="assets/js/script.js"></script>
    

