@extends('layouts.app')
@section('content')


    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(https://raw.githubusercontent.com/raed-charrad/BarberManegmentSystem/master/public/assets/images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1 class="mb-4">Contact Us</h1>
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

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
             @endif
            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="name">Name</label>
                      <input name="name" type="text" id="name" class="form-control {{ $errors->has('name') ? 'error' : '' }}">
                      @if ($errors->has('name'))
                      <div class="error">
                          {{ $errors->first('name') }}
                      </div>
                      @endif
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" id="phone" class="form-control {{ $errors->has('phone') ? 'error' : '' }}">
                      @if ($errors->has('phone'))
                      <div class="error">
                          {{ $errors->first('phone') }}
                      </div>
                      @endif
                    </div>
                     <div class="col-md-4 form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'error' : '' }} ">
                      @if ($errors->has('email'))
                      <div class="error">
                          {{ $errors->first('email') }}
                      </div>
                      @endif
                    </div>

                  </div>
                  <div class="col-md-4 form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control {{ $errors->has('subject') ? 'error' : '' }}">
                    @if ($errors->has('subject'))
                    <div class="error">
                        {{ $errors->first('subject') }}
                    </div>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message" class="form-control {{ $errors->has('message') ? 'error' : '' }} " cols="30" rows="8"></textarea>
                    </div>
                    @if ($errors->has('message'))
                    <div class="error">
                        {{ $errors->first('message') }}
                    </div>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit"  name="send" value="Submit"  class="btn btn-primary">
                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section-cover cta" data-stellar-background-ratio="0.5" style="background-image: url(https://raw.githubusercontent.com/raed-charrad/BarberManegmentSystem/master/public/assets/images/big_image_2.jpg);">
      <div class="container">
        <div class="row justify-content-center align-items-center intro">
          <div class="col-md-8 text-center element-animate">
            <h2 class="mb-4"><span>Appoint a Haircut Today and</span> Get 25% discount</h2>
            @if (Auth::check()&&Auth::user()->hasVerifiedEmail())
           <p><button type="button" class="btn btn-black" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Make an Appointment</button></p>
          @else
          <p> <a href="{{ route('login') }}"><button type="button" class="btn btn-black" >Make an Appointment</button></a></p>
          @endif
        </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    @include('layouts.partials.modal')

@endsection
