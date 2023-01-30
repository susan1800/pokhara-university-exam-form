
@include('partials.head')

<div class="login-container">
  <section class="login" id="login">
    <header>
      <h2>Cosmos College</h2>
      <h4>Register</h4>



    </header>
    <div class="flash">
        @include('partials.flash')
    </div>

    <form class="login-form" action="{{route('register')}}" method="post">
		@csrf

      <input type="name" name="name" class="login-input  @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name')}}" autofocus/>
      <p style="margin-top: -23px; color: red;">@error('name') {{ $message }} @enderror</p>


      <input type="text" name="phone" class="login-input form-control @error('phone') is-invalid @enderror" placeholder="phone number" value="{{old('phone')}}"/>
        <p style="margin-top: -23px; color: red;">@error('phone') {{ $message }} @enderror</p>
	    <input type="email" name="email" class="login-input  @error('email') is-invalid @enderror" placeholder="email" value="{{old('email')}}" />
        <p style="margin-top: -23px; color: red;">@error('email') {{ $message }} @enderror</p>
      <input type="password" name="password" class="login-input  @error('password') is-invalid @enderror" placeholder="Password"/>
      <p style="margin-top: -23px; color: red;">@error('password') {{ $message }} @enderror</p>
      @error('password') {{ $message }} @enderror

      <div class="submit-container">
        <button type="submit" class="login-button">SIGN Up</button>

      </div>
	  <br>
	  <p style="text-align:center">Already Have an account ? <a href="{{route('signin')}}">Sign In</a></p>
    </form>

  </section>


</div>


@include('partials.script')
