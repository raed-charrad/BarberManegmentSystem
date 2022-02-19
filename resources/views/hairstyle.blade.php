@extends('layouts.app')
@section('content')

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(https://raw.githubusercontent.com/raed-charrad/BarberManegmentSystem/master/public/assets/images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1 class="mb-4">Hair Styles</h1>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, quo!</p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

 <section class="quick-info element-animate" data-animate-effect="fadeInLeft">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 bgcolor">
            <div class="row">
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-ios-telephone"></span></div>
                  <div class="media-body">
                    <h5>+1 234 5633 342</h5>
                    <p>Call us 24/7 we will get back to you ASAP</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-location"></span></div>
                  <div class="media-body">
                    <h5>249 Division Rad</h5>
                    <p>Fake st. New York, New York City,  PO 2923 USA</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-android-time"></span></div>
                  <div class="media-body">
                    <h5>Daily: 8 am - 10 pm</h5>
                    <p>Mon-Fri, Sunday <br> Saturday: Closed</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <?php $count = 0; ?>
    @foreach ($services as $service)
        <?php if($count == 3) break; ?>
        <section class="site-section pb-5">
            <div class="container">
            <div class="row">
                <div class="col-md-6 video-wrap mb-5">
                    <img src="{{ URL::asset('storage'.$service->image)}}" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="col-md-6 pl-md-5">
                <h3>{{$service->title}}</h3>
                <p class="lead">Expert Barber</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam facere a excepturi quod impedit rerum ipsum totam incidunt, necessitatibus id veritatis maiores quos saepe dolore commodi magnam fugiat. Incidunt, omnis.</p>
                <p>Nobis quae eaque facere architecto eligendi, voluptas quasi, blanditiis aperiam possimus inventore quis nam! Cupiditate necessitatibus, voluptatem excepturi placeat exercitationem quos vitae ut vero dolorem, provident sit odio porro facere.</p>
                </div>
            </div>
            </div>
        </section>
        <?php $count++; ?>
    @endforeach
    <!-- END section -->
    <section class="site-section">

      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2>More Hair Styles</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum magnam illum maiores adipisci pariatur, eveniet.</p>
          </div>
        </div>
        <div class="row top-destination">
            @foreach ($services as $service)
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <a href="#" class="place">
                    <img src="{{ URL::asset('storage'.$service->image)}}" alt="Image placeholder">
                    <h2>Beard Shaving</h2>
                    <p>Learn More</p>
                    </a>
                </div>
             @endforeach
        </div>
      </div>
    </section>
    <!-- END section -->
    <section class="section-cover cta" data-stellar-background-ratio="0.5" style="background-image: url(https://raw.githubusercontent.com/raed-charrad/BarberManegmentSystem/master/public/assets/images/big_image_2.jpg);">
      <div class="container">
        <div class="row justify-content-center align-items-center intro">
          <div class="col-md-8 text-center element-animate">
            <h2 class="mb-4"><span>Appoint a Haircut Today and</span> Get 25% discount</h2>
            @if (Auth::check())
           <p><button type="button" class="btn btn-black" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Make an Appointment</button></p>
          @else
          <p> <a href="{{ route('login') }}"><button type="button" class="btn btn-black" >Make an Appointment</button></a></p>
          @endif
          </div>
        </div>
      </div>
    </section>
@include('layouts.partials.modal')

    <!-- END section -->
@endsection
