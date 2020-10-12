<div class="cd-signin-modal js-signin-modal"> <!-- this is the entire modal form, including the background -->
          <div class="cd-signin-modal__container"> <!-- this is the container wrapper -->
            <ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
              <li><a href="#" data-signin="login" data-type="login">Sign in</a></li>
              <li><a href="#" data-signin="signup" data-type="signup">New account</a></li>
            </ul>

            <div class="cd-signin-modal__block js-signin-modal-block" data-type="login"> <!-- log in form -->
              <form class="cd-signin-modal__form" action="{{route('login')}}" method="post">
                @csrf
                <p class="cd-signin-modal__fieldset">
                  <label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signin-email">E-mail</label>
                  <input id="email" type="email" class=" cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="email"  required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </p>

                <p class="cd-signin-modal__fieldset">
                  <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signin-password">Password</label>
                   <input id="password" type="password" class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <a href="#0" class="cd-signin-modal__hide-password js-hide-password">Hide</a> 
                </p> 
                <p class="cd-signin-modal__fieldset">
                   <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                </p>

                             <!--  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif-->
              </form>
              
             </div> <!-- cd-signin-modal__block -->


           