@extends('admin.layouts.registration')

@section('content')
<div class="form-box-padding register-sec mob-flip-sec">

   <div class="container mob-fullwidth mob-blackbg">
      <div class="formwhitebg sm-box-width form-secton none-whitebg">

         <div class="form-title">
            <h3 class="ft-w-600">Create Your Account</h3>
         </div>
         <div class="on-bording-form-part">
            <form class="items-center" method="POST" action="{{ route('user_store')}}">
               @csrf
               <div class="mb-3">
                  <label class="form-label">Name</label>
                  <div class="form-input-icon">
                     <input type="text" class="form-control" name="name" placeholder="Enter Name">
                  </div>
                  @error('name')
                     <span class="invalid-feedback text-danger" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="mb-3">
                  <label class="form-label">Email Address</label>
                  <div class="form-input-icon">
                     <input type="email" class="form-control" name="email" placeholder="Enter email address">
                  </div>
                  @error('email')
                     <span class="invalid-feedback text-danger" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="mb-3">
                  <label class="form-label">Password</label>
                  <div class="form-input-icon">
                     <input type="password" class="form-control" name="password" placeholder="Enter password">
                     <div class="form-mes-icon desk-none"><a href=""><img src="images/eye-icon.svg" alt=""></a></div>
                  </div>
                  @error('password')
                     <span class="invalid-feedback text-danger" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="mb-3">
                  <label class="form-label">Confirm Password</label>
                  <div class="form-input-icon">
                     <input type="password" class="form-control" name="confirm_pass" placeholder="Enter password">
                     <div class="form-mes-icon desk-none"><a href=""><img src="images/eye-icon.svg" alt=""></a></div>
                  </div>
                  @error('confirm_pass')
                     <span class="invalid-feedback text-danger" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>

               <div class="mb-3 mb-0 pt-2"><input class="btn btn-primary btn-full" type="submit" value="Submit"></div>

            </form>
         </div>
      </div>
   </div>
@endsection