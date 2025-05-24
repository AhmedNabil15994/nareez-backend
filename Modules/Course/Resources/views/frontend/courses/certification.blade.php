<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate</title>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!--    <link rel="stylesheet" href="css/bootstrap.css">-->
  <link rel="stylesheet" href="{{ asset('frontend/certificate') }}/css/style.css">
  <style type="text/css" media="print">
    @page { size: landscape; }
    @page { margin: 0;}
    body{
      margin: 5% 20%;
    }
    * {
      -webkit-print-color-adjust: exact !important;   /* Chrome, Safari 6 – 15.3, Edge */
      color-adjust: exact !important;                 /* Firefox 48 – 96 */
      print-color-adjust: exact !important;           /* Firefox 97+, Safari 15.4+ */
    }
    .pm-certificate-container{
      width: 100%;
      min-height: 550px !important;
      height: auto;
      display: block;
      background: #618597 !important;
    }
    .pm-certificate-container .pm-certificate-border{
      position: unset;
      left: 0;
      top: 0;
      display: block;
      width: 95%;
      padding: 0;
      background-color: #fff !important;
      margin: 2.5%;
      border:5px solid #f9f9f9  !important;
    }
    .pm-certificate-container .outer-border{
      display: block;
      width: 100%;
      top: 0;
      left: 0;
      margin: 0;
    }
    .pm-certificate-container .inner-border,
    .pm-certificate-container .outer-border{
      display: none;
    }
    .pm-certificate-container .pm-certificate-border .pm-certificate-footer{
      width: 85%;
      left: 0;
      margin: 0;
      margin-left: 5%;
    }
    .printCertificate{
      display: none !important;
    }
  </style>
  <style>
    .pm-certificate-container .pm-certificate-border .pm-certificate-footer{
      bottom: -35px;
    }
    .printCertificate{
      width: 200px;
      display: block;
      margin:auto;
      margin-top: 30px;
      padding: 15px;
      border-radius: 5px;
      outline: 0;
    }
  </style>
</head>

<body>
  <div class="container pm-certificate-container" id="pm-certificate-container">
    <div class="outer-border"></div>
    <div class="inner-border"></div>

    <div class="pm-certificate-border col-xs-12">

      <div class="row pm-certificate-header">
        <div class="pm-certificate-title  col-xs-4 text-center">
          <img src="{{ asset('frontend/certificate') }}/img/car.png" />
        </div>
        <div class="pm-certificate-title  col-xs-4 text-center">
          <img src="{{ asset('frontend/certificate') }}/img/SiteLogo.png" />
        </div>
        <div class="pm-certificate-title  col-xs-4 text-center">
          <img src="{{ asset('frontend/certificate') }}/img/Logo-right.png" />
        </div>
      </div>

      <div class="row pm-certificate-body">

        <div class="pm-certificate-block">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-xs-3">
                <!-- LEAVE EMPTY -->
              </div>
              <div class="pm-certificate-name margin-0-20 col-xs-6 text-center">
                <span class="pm-name-text bold">أكاديمية ناريز</span>
              </div>
              <div class="col-xs-3">
                <!-- LEAVE EMPTY -->
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="row">
              <div class="col-xs-3">
                <!-- LEAVE EMPTY -->
              </div>
              <div class="pm-certificate-name underline margin-0-20 col-xs-6 text-center">
                <span class="pm-name-text-user kufi bold">{{ $orderCourse->user->name }} </span>
              </div>
              <div class="col-xs-3">
                <span class="pm-name-text-right bold">تشهد بأن</span>
              </div>
            </div>
          </div>


          <div class="col-xs-12">
            <div class="row">
              <div class="col-xs-3">
                <!-- LEAVE EMPTY -->
              </div>
              <div class="pm-course-title underline col-xs-6 text-center">
                <span class="pm-credits-text block bold kufi">{{ $orderCourse->course->title }}</span>
              </div>
              <div class="col-xs-3">
                <span class="pm-name-text-right bold">قد تم إجتيازكم دورة</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="row">
            <div class="pm-certificate-footer">
              <div class="col-xs-4 pm-certified col-xs-4 text-center">
                <span class="pm-credits-text block sans">المدرب</span>
                <span class="pm-empty-space block underline"></span>
                <span class="bold block kufi">{{ $orderCourse->course->trainer->name }}</span>
                <span class="block mt-5"><img src="{{ asset('frontend/certificate') }}/img/tawqeea.png" /></span>
              </div>
              <div class="col-xs-4">
                <!-- LEAVE EMPTY -->
              </div>

              <div class="col-xs-4 pm-certified col-xs-4 text-center">
                <span class="pm-credits-text block sans">التاريخ</span>
                <span class="pm-empty-space block underline"></span>
                <span class="bold block">{{ date('Y-m-d') }}</span>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <button class="printCertificate btn-md btn-primary">@lang('Get your certification')</button>
  <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>
  <script>
      $(function(){
        $('.printCertificate').on('click',function (){
          $('#pm-certificate-container').print()
        })
      })
  </script>
</body>

</html>
