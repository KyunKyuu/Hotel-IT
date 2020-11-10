@extends('layouts/site_/main')

@section('title', 'Contact Us')

@section('navbar')
@include('layouts.site_.navbar5')
@endsection

@section('content')

    <!-- hero -->
    <div class="hero">
      <div class="hero-text text-white position-absolute">
        <div class="row">
          <div class="col-lg-6 col-md-6 lh-lg p-5">
            <h1>Contact Us</h1>
            <h5>We take our commitment to our users seriously If you need our help with your user account, have questions about how to use the platform or are experiencing technical difficulties, please do not hesitate to contact us</h5>
            <div class="alamat w-75">
              <h4>Hotel Blitzkrieg Kp.Cigiringsing No.35 Kec.Ujungberung</h4>
            </div>
            <div class="d-flex">
              <i class="fas fa-phone-alt active mt-2 mr-2"></i>
              <h5 class="mb-0">0831-8531-1212</h5>
            </div>
            <div class="d-flex">
              <i class="fas fa-envelope active mt-2 mr-2"></i>
              <h5 class="mb-0">support@itclub.com</h5>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 p-5 contact-us">
            <div class="pt-5 float-right w-75">

           <form method="post" action="{{ route('contact_send') }}">
            @csrf
              <h5>Full Name</h5>
              <input class="form-control personal-input pl-2 mb-2" name="name" placeholder="Name" type="text" aria-label="deafult input example">
              <h5>Email Address</h5>
              <input class="form-control personal-input pl-2 mb-2" placeholder="email@example.com" type="email"  name="email" aria-label="deafult input example">
              <h5>Message</h5>
              <textarea class="form-control pl-2" placeholder="enter a message" name="message" rows="3"></textarea>
              <input type="submit" name="send" value="Submit" class="btn btn-1 px-5 py-1 mt-3 float-right">
        </form>
            </div>
          </div>
        </div>
      </div>
      <img src="{{asset('site_/img/bg.png')}}">
    </div>
    <!-- hero -->

    <div class="container contact p-5">
      <div class="contact-support">
        <h1>Contact Support</h1>
        <p class="lh-lg w-sm-100 w-75">We understand you may have questions that are not answered in our FAQ section. <br> if you cannot find the answer to your question, please feel free to contact support.</p>
      </div>
      <div class="bg-gradient-local2 rounded">
        <div class="row mt-5">
          <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
            <img src="{{asset('site_/img/ic_headset.png')}}" class="contact-icon">
            <p class="text-white py-5 mb-0">Customer Service Support</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
            <img src="{{asset('site_/img/ic_setting.png')}}" class="contact-icon">
            <p class="text-white py-5 mb-0">Technical Support</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
            <p class="text-white pt-4 mt-2 mb-1">Technical Support</p>
            <p class="text-contact-email">support@itclub.com</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container contact px-5">
      <div class="bg-contact">
        <p class="text-white m-1">For questions about hiring or to schedule a IT Club client demo, <br> Please contact us at sales@itclub.com</p>
      </div>
    </div>
@endsection