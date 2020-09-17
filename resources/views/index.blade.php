 @include('my_layout.header')
 
     <div class="error-pagewrap">
		<div class="error-page-int">
           <img class="main-logo" src="" alt="" style="width: 120px;"  / ><br>
			<div class="text-center m-b-md custom-login">
				<h3>WELCOME BACK!</h3>
				<p>Please login to my project management app</p>
			</div>
           
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                       <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="help-block small">Your unique email to app</span>
                                 @error('email')
                                    <span class="invalid-feedback  alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="help-block small">Your strong password</span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                     {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                            <button class="btn btn-success btn-block loginbtn" type="submit"  name="login">Login</button>
                        </form>
                    </div>
                </div>
			</div>
