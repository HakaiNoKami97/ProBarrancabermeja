<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>



<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- chatbot 19d -->
<script src="assets/js/widget.js"></script>
<script type="text/javascript">
    var bAbierta = false;
    var botmanWidget = {
        frameEndpoint: 'chat.html',
        chatServer: 'php/api/botman/chat.php',
        title: '',
        mainColor: '#2a2e6d',
        bubbleBackground: '#2a2e6d',
        aboutText: '',
        bubbleAvatarUrl: 'assets/img/pro.png',
        headerTextColor: 'white',
        placeholderText: "Escribe algo",
        desktopHeight: 600,
        introMessage: "¡Hola! Soy un Bot, Bienvenido a Probarrancabermeja",
        aboutLink: "",
    };

    function config_titulo() {
        setTimeout(() => {
            $("#titleBot").html(`
                <div class="topbar-avatar" style=" width: 35px;height: 35px;background-size: cover;border-radius: 50%;clear: both;float: left;background-position: center center;color: #fff;margin-right: 7px;margin-top: 1px;display: inline-block;background-image: url(assets/img/pro.png);"></div> 
                <div class="topbar-text" style="display: inline-block;height: 100%;">
                <div class="topbar-title" style=" font-size: 16px;font-weight: 700;color: white;height: 22px;margin-bottom: 5px;">Probarrancabermeja </div> 
                <div class="topbar-subtitle" style="  color: white;font-size: 12px;line-height: 7px;">
                <div><span class="icon-status" style="  border-radius: 50%;display: inline-block;width: 8px;height: 8px;margin-right: 4px;background-color: #2ea247;"></span> Disponible ahora </div>
                </div>
                </div>`)
        }, 10);
    }
</script>