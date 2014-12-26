<?php
class AuthController extends BaseController {
  public function status() {
    return Response::json(Auth::check());
  }
  public function secrets() {
    if(Auth::check()) {
      return 'You are logged in, here are secrets.';
    } else {
      return 'You aint logged in, no secrets for you.';
    }
  }
  public function login()
  {
        // Declare the rules for the form validation
    $rules = array(
      'email'    => 'required|email',
      'password' => 'required|between:3,32',
    );

    // Create a new validator instance from our validation rules
    $validator = Validator::make(Input::all(), $rules);

    // If validation fails, we'll exit the operation now.
    if ($validator->fails())
    {
      // Ooops.. something went wrong
      return Redirect::back()->withInput()->withErrors($validator);
    }

    try
    {
      // Try to log the user in
      Sentry::authenticate(Input::only('email', 'password'), Input::get('remember-me', 0));

      // Get the page we were before
      $redirect = Session::get('loginRedirect', 'account');

      // Unset the page we were before from the session
      Session::forget('loginRedirect');

      // Redirect to the users page
      return Response::json(array(
        'user' =>Sentry::getUser(),
        'flash' => 'user succesfully logged In'
        ),200);
      // return Redirect::to($redirect)->with('success', Lang::get('auth/message.signin.success'));
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
      $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));
    }
    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
    {
      $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
    }
    catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
    {
      $this->messageBag->add('email', Lang::get('auth/message.account_suspended'));
    }
    catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
    {
      $this->messageBag->add('email', Lang::get('auth/message.account_banned'));
    }

    // Ooops.. something went wrong
    // return Redirect::back()->withInput()->withErrors($this->messageBag);
   return Response::json(array('flash' => 'Invalid username or password'), 500);
    
  }
  public function logout()
  {
    Sentry::logout();
    return Response::json(array('flash' => 'Logged Out!'));
  }
}