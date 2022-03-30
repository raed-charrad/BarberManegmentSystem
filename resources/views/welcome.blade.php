@extends('layouts.app')
@section('content')
   <!-- END header -->
   <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url({{asset('assets/images/big_image_1.jpg')}});">
     <div class="container">
       <div class="row align-items-center site-hero-inner justify-content-center">
         <div class="col-md-8 text-center">

           <div class="mb-5 ">
             <img src="https://raw.githubusercontent.com/raed-charrad/BarberManegmentSystem/master/public/assets/images/banner_text_1.png" alt="Image placeholder" class="img-md-fluid">
           </div>

         </div>
       </div>
     </div>
   </section>
   <!-- END section -->

   <section class="quick-info " data-animate-effect="fadeInLeft">
     <div class="container">
       <div class="row">
         <div class="col-lg-8 bgcolor">
           <div class="row">
             <div class="col-md-4 mb-3">
               <div class="media">
                 <div class="mr-3 icon-wrap"><i class="bi bi-telephone-fill"></i></span></div>
                 <div class="media-body">
                   <h5>+1 234 5633 342</h5>
                   <p>Call us 24/7 we will get back to you ASAP</p>
                 </div>
               </div>
             </div>
             <div class="col-md-4 mb-3">
               <div class="media">
                 <div class="mr-3 icon-wrap"><i class="bi bi-geo-alt-fill"></i></span></div>
                 <div class="media-body">
                   <h5>249 Division Rad</h5>
                   <p>Fake st. New York, New York City,  PO 2923 USA</p>
                 </div>
               </div>
             </div>
             <div class="col-md-4 mb-3">
               <div class="media">
                 <div class="mr-3 icon-wrap"><i class="bi bi-clock"></i></span></div>
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
         <div class="col-md-4 pr-5">

           <h2 class="mb-3">Services</h2>
           <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>

           <div class="mb-3 custom-nav">
             <a href="#" class="btn btn-primary btn-sm custom-prev mr-2 mb-2"><i class="bi bi-arrow-left"></i></span></a>
             <a href="#" class="btn btn-primary btn-sm custom-next mr-2 mb-2"><i class="bi bi-arrow-right"></i></span></a>
           </div>
         </div>
         <div class="col-md-8">
           <div class="row">
             <div class="col-md-12 slider-wrap">
               <div class="owl-carousel owl-theme no-nav js-carousel-1">

                @foreach ($services as $service)
                <a href="#" class="img-bg" style="background-image: url('{{ URL::asset('storage'.$service->image)}}')">
                    {{-- <img src="{{ URL::asset('storage'.$service->image)}}" alt="" width="90" height="90"> --}}
                    <div class="text">
                      <span class="icon custom-icon flaticon-scissors"></span>
                      <h2>{{ $service->title }}</h2>
                      <p>Read More</p>
                    </div>
                  </a>
             @endforeach
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
       <div class="row justify-content-center mb-5">
         <div class="col-md-7 text-center">
           <h2>Barber Features</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum magnam illum maiores adipisci pariatur, eveniet.</p>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4">

           <div class="media d-block media-feature text-center">
             <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors-1"></span></div>
             <div class="media-body">
               <h3>Shave &amp; Haircut</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
             </div>
           </div>

         </div>
         <div class="col-md-4">
           <div class="media d-block media-feature text-center">
             <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-cream"></span></div>
             <div class="media-body">
               <h3>Cream &amp; Shampoo</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
             </div>
           </div>
         </div>
         <div class="col-md-4">
           <div class="media d-block media-feature text-center">
             <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-moustache"></span></div>
             <div class="media-body">
               <h3>Mustache Expert</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
             </div>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-4">

           <div class="media d-block media-feature text-center">
             <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors"></span></div>
             <div class="media-body">
               <h3>Haircut Styler</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
             </div>
           </div>

         </div>
         <div class="col-md-4">
           <div class="media d-block media-feature text-center">
             <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-razor"></span></div>
             <div class="media-body">
               <h3>Razor For Beards</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
             </div>
           </div>
         </div>
         <div class="col-md-4">
           <div class="media d-block media-feature text-center">
             <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-hair-comb"></span></div>
             <div class="media-body">
               <h3>Haircomb</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- END section -->

   <section class="section-cover cta" data-stellar-background-ratio="0.5" style="background-image: url(https://raw.githubusercontent.com/raed-charrad/BarberManegmentSystem/master/public/assets/images/big_image_2.jpg);">
     <div class="container">
       <div class="row justify-content-center align-items-center intro">
         <div class="col-md-8 text-center ">
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

   <section class="site-section">
     <div class="container">
       <div class="row">
         <div class="col-md-6 video-wrap mb-5">
           <img src="https://raw.githubusercontent.com/raed-charrad/BarberManegmentSystem/master/public/assets/images/img_5.jpg" alt="Image placeholder" class="img-fluid">
         </div>
         <div class="col-md-6 pl-md-5">
           <h3>Good Looking Style</h3>
           <p class="lead">Start with us today</p>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam facere a excepturi quod impedit rerum ipsum totam incidunt, necessitatibus id veritatis maiores quos saepe dolore commodi magnam fugiat. Incidunt, omnis.</p>
           <p>Nobis quae eaque facere architecto eligendi, voluptas quasi, blanditiis aperiam possimus inventore quis nam! Cupiditate necessitatibus, voluptatem excepturi placeat exercitationem quos vitae ut vero dolorem, provident sit odio porro facere.</p>
         </div>
       </div>
     </div>
   </section>
   <!-- END section -->
   @include('layouts.partials.modal')

@endsection
