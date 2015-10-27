<?php namespace Course\Http\Controllers\Admin;

use Course\Http\Requests;
use Course\Http\Controllers\Controller;

//Clase Request:
use Illuminate\Http\Request;

use Hash;
use Auth;
use Redirect;

//Facade para Request:
	//use Request;

use Course\User;


class UsersController extends Controller {
	/*
	 * Inyección de la dependencia Request.
	 * Hay otra manera de hacerlo, y es usando Facades. Request::all() dentro de la función;
	
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}*/


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$users = User::where('type','=', 'user')->simplePaginate(15);
		$users = User::orderBy('first_name', 'ASC')->paginate();

		return view('admin/users/index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @param Request $request
	 * @return Response
	 */
	public function create()
	{
		return view('admin/users/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request )
	{
		//Con inyección de dependencias:
		//dd($request->all());

		//Con Facades sería así:
		//dd(Request::all());
		if (Auth::check())
		{
			/*return "Logeado y es: ". $request->user()->toArray()['first_name'] 
					. ' y tiene ID: '. $request->user()->toArray()['id'];*/
			$user = new User($request->all());
			$validation = User::where('email','=',$request->input('email'))
							   ->get()->toArray();
							   
			if ($validation)
			{
				return "Email ya registrado";
			}else
			{
			   /*
				* Recuperamos el campo type del formulario y se lo asignamos al objeto tipo usuario:
				* Ya que dentro del modelo, definimos que type no sería cargado automáticamente.
				*/
				$user->type = $request->input('type');
				//Es necesario codificar la contraseña antes de alñmacenarla en la Base de Datos:
				$user->password = Hash::make($request->input('password'));
				$user->save();

				//Redirección a una ruta con nombre:
				return Redirect::route('admin.users.index');
			}	
		}else
		{
			//No loggeado, redirecciona al login:
			//Redirección a una ruta sólo con url, no tiene nombre:
			return redirect('auth/login');
		}		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
