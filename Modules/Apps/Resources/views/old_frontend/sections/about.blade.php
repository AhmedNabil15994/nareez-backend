<div class="section grey-bg aboutHome-section position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="home-about wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <h2 class="section-title">{!! $type->title !!}</h2>
                    <p>
                      {!! $type->desc !!}
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="img-box wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <img class="img-fluid" src="{{  asset($type->image)  }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="shape"></div>
</div>
