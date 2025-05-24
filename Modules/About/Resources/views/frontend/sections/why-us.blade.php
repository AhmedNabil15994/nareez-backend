<div class="alraed-features section gredient-light">
    <div class="container">
        <div class="container">
            <div class="title-center">
                <h2 class="wow fadeInUp" data-wow-delay="0.2s"> {{ $type->title }}</h2>
                <img class="img-fluid" src="{{ asset('frontend/images/title-shape.png') }}" alt="" />

            </div>
            <div class="row d-flex justify-content-between align-items-center text-center">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">

                    @if(data_get($type->sections,'0'))
                    <div class="howWork-block">
                        <div class="block-icon"><img class="img-fluid" 
                            src="{{asset(data_get($type->sections,'0.image'))}}" 
                         alt=""></div>
                        <h3> {{ data_get($type->sections,'0.title') }}</h3>
                        <p>
                            {!! data_get($type->sections,'0.desc') !!}
                        </p>
                    </div>
                    @endif
                    @if(data_get($type->sections,'1'))
                    <div class="howWork-block">
                        <div class="block-icon"><img class="img-fluid" src="{{asset(data_get($type->sections,'1.image'))}}" alt=""></div>
                        <h3> {{ data_get($type->sections,'1.title') }}</h3>
                        <p>
                            {!! data_get($type->sections,'1.desc') !!}
                        </p>
                    </div>
                   @endif
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="img-box img-animate">
                        <img src="{{  url(setting('logo')) }}" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                    @if(data_get($type->sections,'2'))
                    <div class="howWork-block">
                        <div class="block-icon"><img class="img-fluid" 
                         src="{{asset(data_get($type->sections,'2.image'))}}" alt=""></div>
                        <h3> {{ data_get($type->sections,'2.title') }}</h3>
                        <p>
                            {!! data_get($type->sections,'2.desc') !!}
                        </p>
                    </div>
                    @endif
                    @if(data_get($type->sections,'3'))
                    <div class="howWork-block">
                        <div class="block-icon"><img class="img-fluid" 
                            src="{{asset(data_get($type->sections,'3.image'))}}" alt=""></div>
                        <h3> {{ data_get($type->sections,'3.title') }}</h3>
                        <p>
                            {!! data_get($type->sections,'3.desc') !!}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

