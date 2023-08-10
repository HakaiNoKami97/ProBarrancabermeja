/**
 * Template Name: Medicio - v2.1.1
 * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

$("#preloader")
    .delay(500)
    .fadeOut("slow", function () {
        $(this).remove();
    });
aos_init();
// Smooth scroll for the navigation menu and links with .scrollto classes
var scrolltoOffset = $("#header").outerHeight() - 1;
$(document).on("click", ".nav-menu a, .mobile-nav a, .scrollto", function (e) {
    if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
        var target = $(this.hash);
        if (target.length) {
            e.preventDefault();

            var scrollto = target.offset().top - scrolltoOffset;

            if ($(this).attr("href") == "#header") {
                scrollto = 0;
            }

            $("html, body").animate(
                {
                    scrollTop: scrollto,
                },
                1500,
                "easeInOutExpo"
            );

            if ($(this).parents(".nav-menu, .mobile-nav").length) {
                $(".nav-menu .active, .mobile-nav .active").removeClass("active");
                $(this).closest("li").addClass("active");
            }

            if ($("body").hasClass("mobile-nav-active")) {
                $("body").removeClass("mobile-nav-active");
                $(".mobile-nav-toggle i").toggleClass("icofont-navigation-menu icofont-close");
                $(".mobile-nav-overly").fadeOut();
            }
            return false;
        }
    }
});

// Activate smooth scroll on page load with hash links in the url
$(document).ready(function () {
    var pagina = window.location.pathname.substring(last).replace(".php", "");

    if (window.location.hash) {
        var initial_nav = window.location.hash;
        if ($(initial_nav).length) {
            var scrollto = $(initial_nav).offset().top - scrolltoOffset;
            $("html, body").animate(
                {
                    scrollTop: scrollto,
                },
                1500,
                "easeInOutExpo"
            );
        }
    }
});

// Mobile Navigation
if ($(".nav-menu").length) {
    var $mobile_nav = $(".nav-menu").clone().prop({
        class: "mobile-nav d-lg-none",
    });
    $("body").append($mobile_nav);
    $("body").prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $("body").append('<div class="mobile-nav-overly"></div>');

    $(document).on("click", ".mobile-nav-toggle", function (e) {
        $("body").toggleClass("mobile-nav-active");
        $(".mobile-nav-toggle i").toggleClass("icofont-navigation-menu icofont-close");
        $(".mobile-nav-overly").toggle();
    });

    $(document).on("click", ".mobile-nav .drop-down > a", function (e) {
        e.preventDefault();
        $(this).next().slideToggle(300);
        $(this).parent().toggleClass("active");
    });

    $(document).click(function (e) {
        var container = $(".mobile-nav, .mobile-nav-toggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($("body").hasClass("mobile-nav-active")) {
                $("body").removeClass("mobile-nav-active");
                $(".mobile-nav-toggle i").toggleClass("icofont-navigation-menu icofont-close");
                $(".mobile-nav-overly").fadeOut();
            }
        }
    });
} else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
}

// Toggle .header-scrolled class to #header when page is scrolled
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $("#header").addClass("header-scrolled");
        $("#topbar").addClass("topbar-scrolled");
        $(".wave").css("bottom", "0");
    } else {
        $("#header").removeClass("header-scrolled");
        $("#topbar").removeClass("topbar-scrolled");
        $(".wave").css("bottom", "-94px");
    }
});

if ($(window).scrollTop() > 100) {
    $("#header").addClass("header-scrolled");
    $("#topbar").addClass("topbar-scrolled");
    $(".wave").css("bottom", "0");
}

// Intro carousel
var heroCarousel = $("#heroCarousel");
var heroCarouselIndicators = $("#hero-carousel-indicators");
heroCarousel
    .find(".carousel-inner")
    .children(".carousel-item")
    .each(function (index) {
        index === 0
            ? heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "' class='active'></li>")
            : heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "'></li>");
    });

// Back to top button
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $(".back-to-top").fadeIn("slow");
    } else {
        $(".back-to-top").fadeOut("slow");
    }
});

$(".back-to-top").click(function () {
    $("html, body").animate(
        {
            scrollTop: 0,
        },
        1500,
        "easeInOutExpo"
    );
    return false;
});

// Preloader
// $(window).on("load", function () {
//     if ($("#preloader").length) {
//         $("#preloader")
//             .delay(100)
//             .fadeOut("slow", function () {
//                 $(this).remove();
//             });
//     }
// });

// jQuery counterUp
$('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000,
});

// Testimonials carousel (uses the Owl Carousel library)
$(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
        0: {
            items: 1,
        },
        768: {
            items: 2,
        },
        900: {
            items: 3,
        },
    },
});

// Gallery carousel (uses the Owl Carousel library)
$(".gallery-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    slideTransition: "linear",
    autoplayTimeout: 4000,
    autoplaySpeed: 4000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        768: {
            items: 3,
        },
        992: {
            items: 4,
        },
        1200: {
            items: 5,
        },
    },
});

// Init AOS
function aos_init() {
    AOS.init({
        duration: 500,
        once: true,
    });
}

function enviarFormularioContacto() {
    var empresa = $("#empresa").val();
    var nombre = $("#nombre").val();
    var correo = $("#mail").val();
    var telefono = $("#telefono").val();
    var mensaje = $("#mensaje").val();
    var response = grecaptcha.getResponse();
    if (empresa != "" && nombre != "" && correo != "" && telefono != "") {
        if (response) {
            $.ajax({
                data: { peticion: "sendFormContacto", nombre: nombre, empresa: empresa, correo: correo, telefono: telefono, mensaje: mensaje }, //necesario para enviar archivos
                dataType: "json", //Si no se especifica jQuery automaticamente encontrará el tipo basado en el header del archivo llamado (pero toma mas tiempo en cargar, asi que especificalo)
                url: "php/controller/controllerContacto.php", //url a donde hacemos la peticion
                type: "POST",
                beforeSend: function () {
                    Swal.fire({
                        title: "Enviando Formulario",
                        html: "<b></b>",
                        didOpen: () => {
                            Swal.showLoading();
                            const b = Swal.getHtmlContainer().querySelector("b");
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                    });
                },
                success: function (result) {
                    var estado = result.status;
                    switch (estado) {
                        case "0":
                            Swal.close();
                            Swal.fire("", "Hubo un Error al Enviar el Formulario", "info");
                            break;
                        case "1":
                            Swal.close();
                            $("#frmContacto").trigger("reset");
                            Swal.fire("", "Formulario Enviado", "success");
                            break;
                    }
                },
                error: function () {},
            });
        } else {
            Swal.fire("", "Hubo un Error con el CAPTCHA", "info");
        }
    } else {
        Swal.fire("", "Debe ingresar todos los datos", "info");
    }
}

function enviarFormularioContactanos() {
    var nombre = $("#nombre").val();
    var correo = $("#mail").val();
    var asunto = $("#asunto").val();
    var mensaje = $("#mensaje").val();
    var response = grecaptcha.getResponse();
    if (nombre != "" && correo != "" && asunto != "") {
        if (response) {
            $.ajax({
                data: { peticion: "sendFormContactanos", nombre: nombre, asunto: asunto, correo: correo, mensaje: mensaje }, //necesario para enviar archivos
                dataType: "json", //Si no se especifica jQuery automaticamente encontrará el tipo basado en el header del archivo llamado (pero toma mas tiempo en cargar, asi que especificalo)
                url: "php/controller/controllerContacto.php", //url a donde hacemos la peticion
                type: "POST",
                beforeSend: function () {
                    Swal.fire({
                        title: "Enviando Formulario",
                        html: "<b></b>",
                        didOpen: () => {
                            Swal.showLoading();
                            const b = Swal.getHtmlContainer().querySelector("b");
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                    });
                },
                success: function (result) {
                    var estado = result.status;
                    switch (estado) {
                        case "0":
                            Swal.close();
                            Swal.fire("", "Hubo un Error al Enviar el Formulario", "info");
                            break;
                        case "1":
                            Swal.close();
                            $("#frmContacto").trigger("reset");
                            Swal.fire("", "Formulario Enviado", "success");
                            break;
                    }
                },
                error: function () {},
            });
        } else {
            Swal.fire("", "Hubo un Error con el CAPTCHA", "info");
        }
    } else {
        Swal.fire("", "Debe ingresar todos los datos", "info");
    }
}

function enviarFormularioExportaciones() {
    var empresa = $("#empresa").val();
    var nombre = $("#nombre").val();
    var correo = $("#mail").val();
    var telefono = $("#telefono").val();
    var response = grecaptcha.getResponse();
    if (empresa != "" && nombre != "" && correo != "" && telefono != "") {
        if (response) {
            $.ajax({
                data: { peticion: "sendFormExportaciones", nombre: nombre, empresa: empresa, correo: correo, telefono: telefono }, //necesario para enviar archivos
                dataType: "json", //Si no se especifica jQuery automaticamente encontrará el tipo basado en el header del archivo llamado (pero toma mas tiempo en cargar, asi que especificalo)
                url: "php/controller/controllerContacto.php", //url a donde hacemos la peticion
                type: "POST",
                beforeSend: function () {
                    Swal.fire({
                        title: "Enviando Formulario",
                        html: "<b></b>",
                        didOpen: () => {
                            Swal.showLoading();
                            const b = Swal.getHtmlContainer().querySelector("b");
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                    });
                },
                success: function (result) {
                    var estado = result.status;
                    switch (estado) {
                        case "0":
                            Swal.close();
                            Swal.fire("", "Hubo un Error al Enviar el Formulario", "info");
                            break;
                        case "1":
                            Swal.close();
                            $("#frmContacto").trigger("reset");
                            Swal.fire("", "Formulario Enviado", "success");
                            break;
                    }
                },
                error: function () {},
            });
        } else {
            Swal.fire("", "Hubo un Error con el CAPTCHA", "info");
        }
    } else {
        Swal.fire("", "Debe ingresar todos los datos", "info");
    }
}
