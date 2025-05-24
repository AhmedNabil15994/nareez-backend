<!DOCTYPE html>
<html dir="{{ locale() == 'ar' ? 'rtl' : 'ltr' }}"
  lang="{{ locale() == 'ar' ? 'ar' : 'en' }}">
@include('apps::frontend.layouts._header')

<body>
  <div class="main-content">
    @include('apps::frontend.layouts.header-section',[
    'headerCategories' => $categories??[],
    'aboutUs' => $aboutUs??[]
    ])
    <div class="site-main"
      id="main">
      @yield('content')
    </div>
    @include('apps::frontend.layouts.footer-section')
  </div>

  @if(setting('contact_us','mobile'))
  <a href="https://wa.me/{{ setting('contact_us','mobile') }}"
    class="whatsapp-chat no-print"
    data-toggle="tooltip"
    data-placement="top"
    target="_blank"
    style="z-index: 999"
    title="تواصل معنا"
    target="_blank">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_vfaddvqs.json"
      background="transparent"
      speed="1"
      style="width: 70px; height: 70px;"
      loop
      autoplay></lottie-player>
  </a>
  @endif

  @include('apps::frontend.layouts.scripts')
<script>
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
</script>
</body>

</html>
