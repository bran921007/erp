<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /auth
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home.login');
	}

	public function login()
	{

		$data = Input::only('email', 'password', 'remember');

        $credentials = ['email' => $data['email'], 'password' => $data['password']];


        if (Auth::attempt($credentials, $data['remember']))
        {	
            return Redirect::intended('/dashboard');   
        }else{
        	return Redirect::intended('/login');
        }

          return Response::json(array(
              'success' => false,
              'errors' => 'La contraseña es incorrecta. Asegúrate de usar la contraseña de tu cuenta.'
          ));
	}


	public function logout()
    {
      if(Auth::check())
      {
        Auth::logout();
      }
      return Redirect::to('login');
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /auth/create
	 *
	 * @return Response
	 */
	public function registrar()
	{
		$input = Input::all();
		$input['password'] = Hash::make($input['password']);
		return User::create($input);
	}



}