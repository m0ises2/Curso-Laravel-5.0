<?php 
namespace Course\Http\Controllers;

use Course\User;

class UsersController extends Controller
{
	//Al usar las rutas con controllers (ver archivo routes), se debe
	//colocar el rpefijo get o post a la función del controlador dependiendo
	//de que método querramos usar, si get o post, para acceder a esa función.
	public function getIndex()
	{
		//Asi sería una consulta usando solamente FLuent:
		$result = \DB::table('users')
		->select(
				'users.*',
				'user_profiles.id as profile_id',
				'user_profiles.twitter',
				'user_profiles.birthdate'			 
				 )
		->orderBy('id', 'ASC')
		->leftJoin('user_profiles', 'user_id', '=', 'users.id')
		->first();

		//Así agregamos propiedades al objeto Result.
		//$result->full_name = "Dora la Exploradora";
		
		dd($result);

		return $result;
	}
	
	//Así sería una consulta utilizando Elocuent y Fluent:
	public function getOrm()
	{
		$users = User::select('id', 'first_name', 'last_name')
				->with('userProfile')
				//Aquí consulto cuales son las bicicletas asociadas
				//al id actual:
				->with('bicis')
				->where('first_name', '<>', 'Moisés')
				->orderBy('id', 'DESC')
				->get();

		dd($users->toArray());
		
		//Ejemplo de definición de otra propiedad para la relación.
		//dd($user->userProfile->ager);
	}
}