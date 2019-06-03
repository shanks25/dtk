@extends('user.layouts.app')

@section('content')

 <br><br>
 
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="contactform.css">

<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
       
        

          <form class="form-horizontal" action="{{ route('send') }}" method="post">
          {{csrf_field()}}
          <fieldset>
         
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control" required>
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control" required>
              </div>
            </div>
                
                  <div class="form-group">
              <label class="col-md-3 control-label" for="mobile">Mobile Number</label>
              <div class="col-md-9">
                <input id="mobile" name="mobile" type="number" placeholder="Your Mobile No.." class="form-control" required>
              </div>
            </div>
        
               <div class="form-group">
              <label class="col-md-3 control-label" for="address">Address</label>
              <div class="col-md-9">
                <input id="address" name="address" type="text" placeholder="Your address" class="form-control" required>
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message for Catering Inquiry</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="msg" placeholder="Please enter your message here..." rows="5" required></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-lg" style="background-color:#dd1c1c;color:white;">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
 
      </div>
    </div>
</div>

@include('user.layouts.partials.footer')
@endsection

