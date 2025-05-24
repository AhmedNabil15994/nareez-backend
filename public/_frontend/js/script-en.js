(function ($) {
    ("use strict");
    new WOW().init();

    /*========== Add Class active To search Form  ==========*/
    $(".header-inner .navbar .nav li a").on("click", function (e) {
        if ($(this).attr("href").charAt(0) === "#") {
            e.preventDefault();
        }
        $(this).next().slideToggle();
    });
    /*========== Add Class active To side menu  ==========*/
    $(".header-inner .nav-search .bar-icon a").on("click", function (e) {
        e.preventDefault();
        $(".side-menu").addClass("open");
    });

    $(".header-inner .responsive-menu").on("click", function () {
        $(".navbar").toggleClass("active");
        $(".search-form").removeClass("active");
    });
    $(".header-inner .menu-close").on("click", function () {
        $(".navbar").removeClass("active");
        return false;
    });
    $(".courses-recommended").owlCarousel({
        navigation: true,
        pagination: true,
        nav: false,
        dots: true,
        loop: false,
        autoplay: false,
        margin: 20,
        items: 4,
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 4,
            },
        },
    });
    $(".testimonials").owlCarousel({
        navigation: true,
        pagination: true,
        nav: false,
        dots: true,
        loop: false,
        autoplay: false,
        margin: 15,
        items: 3,
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
            1200: {
                items: 3,
            },
        },
    });
    $(document).ready(function () {
        if ($(window).width() < 991) {
            $(".footer-inner .row").addClass("owl-carousel");
            $(".footer-inner .row").owlCarousel({
                navigation: true,
                pagination: true,
                nav: false,
                dots: false,
                loop: false,
                autoplay: false,
                margin: 10,
                items: 2,
            });
        }
    });
    $("[data-rel^=lightcase]").lightcase({
        maxWidth: 1100,
        maxHeight: 800,
    });
    $(".select2").select2();
    $(".open-search").on("click", function () {
        $(".header-search").addClass("active");
        $(".navbar").removeClass("active");
    });
    $(".close-search").on("click", function () {
        $(".header-search").removeClass("active");
    });
    /*======================================
     Google Map
     ======================================*/
    $(".gmap3-area").each(function () {
        var $this = $(this),
            key = $this.data("key"),
            lat = $this.data("lat"),
            lng = $this.data("lng"),
            mrkr = $this.data("mrkr");

        $this
            .gmap3({
                center: [lat, lng],
                zoom: 8,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [
                    {
                        featureType: "administrative.country",
                        elementType: "geometry.fill",
                        stylers: [
                            {
                                visibility: "on",
                            },
                        ],
                    },
                ],
            })
            .marker(function (map) {
                return {
                    position: map.getCenter(),
                    icon: mrkr,
                };
            });
    });

    $(".selectpicker").selectpicker({
        size: 6,
    });
    function starRating(ratingElem) {
        $(ratingElem).each(function () {
            var dataRating = $(this).attr("data-rating");

            function starsOutput(
                firstStar,
                secondStar,
                thirdStar,
                fourthStar,
                fifthStar
            ) {
                return (
                    "" +
                    '<span class="' +
                    firstStar +
                    '"></span>' +
                    '<span class="' +
                    secondStar +
                    '"></span>' +
                    '<span class="' +
                    thirdStar +
                    '"></span>' +
                    '<span class="' +
                    fourthStar +
                    '"></span>' +
                    '<span class="' +
                    fifthStar +
                    '"></span>'
                );
            }
            var fiveStars = starsOutput("star", "star", "star", "star", "star");
            var fourHalfStars = starsOutput(
                "star",
                "star",
                "star",
                "star",
                "star half"
            );
            var fourStars = starsOutput(
                "star",
                "star",
                "star",
                "star",
                "star empty"
            );
            var threeHalfStars = starsOutput(
                "star",
                "star",
                "star",
                "star half",
                "star empty"
            );
            var threeStars = starsOutput(
                "star",
                "star",
                "star",
                "star empty",
                "star empty"
            );
            var twoHalfStars = starsOutput(
                "star",
                "star",
                "star half",
                "star empty",
                "star empty"
            );
            var twoStars = starsOutput(
                "star",
                "star",
                "star empty",
                "star empty",
                "star empty"
            );
            var oneHalfStar = starsOutput(
                "star",
                "star half",
                "star empty",
                "star empty",
                "star empty"
            );
            var oneStar = starsOutput(
                "star",
                "star empty",
                "star empty",
                "star empty",
                "star empty"
            );
            if (dataRating >= 4.75) {
                $(this).append(fiveStars);
            } else if (dataRating >= 4.25) {
                $(this).append(fourHalfStars);
            } else if (dataRating >= 3.75) {
                $(this).append(fourStars);
            } else if (dataRating >= 3.25) {
                $(this).append(threeHalfStars);
            } else if (dataRating >= 2.75) {
                $(this).append(threeStars);
            } else if (dataRating >= 2.25) {
                $(this).append(twoHalfStars);
            } else if (dataRating >= 1.75) {
                $(this).append(twoStars);
            } else if (dataRating >= 1.25) {
                $(this).append(oneHalfStar);
            } else if (dataRating < 1.25) {
                $(this).append(oneStar);
            }
        });
    }
    starRating(".star-rating");
    $(".categories-content").each(function () {
        $(".show-sub").children(".children").show();
        var main = $(this);
        main.children(".cat-parent").each(function () {
            var curent = $(this).find(".children");
            $(this)
                .children(".arrow-cate")
                .on("click", function () {
                    $(this).parent().toggleClass("show-sub");
                    $(this).parent().children(".children").slideToggle(400);
                    main.find(".children").not(curent).slideUp(400);
                    main.find(".cat-parent")
                        .not($(this).parent())
                        .removeClass("show-sub");
                });
            var next_curent = $(this).find(".children");
            next_curent.children(".cat-parent").each(function () {
                var child_curent = $(this).find(".children");
                $(this)
                    .children(".arrow-cate")
                    .on("click", function () {
                        $(this).parent().toggleClass("show-sub");
                        $(this)
                            .parent()
                            .parent()
                            .find(".cat-parent")
                            .not($(this).parent())
                            .removeClass("show-sub");
                        $(this)
                            .parent()
                            .parent()
                            .find(".children")
                            .not(child_curent)
                            .slideUp(400);
                        $(this).parent().children(".children").slideToggle(400);
                    });
            });
        });
    });

    // if ($("#mobile").length) {
    //     var input = document.querySelector("#mobile");
    //     window.intlTelInput(input, {
    //         utilsScript: "/frontend/js/utils.js",
    //         initialCountry: "kw",
    //         hiddenInput: "mobile",
    //     });


    // }
})(jQuery); // End of use strict
