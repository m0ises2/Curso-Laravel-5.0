<?php namespace Course;

use Illuminate\Database\Eloquent\Model;

class BicicletaModel extends Model
{
	//Reference to database table:
	protected $table='bicicleta';
	
	//Relación inversa. Importante definirla para las relaciones de tipo
	//ManyToMany o OneToMany o ManyToOne.
	public function owner()
	{
		//Es necesario indicar explicitamente que columna de la tabla
		//bicicleta hace referencia a la tabla User.
		return $this->belongsTo('Course\User', 'user_id');
	}

	public function getGrandeAttribute()
	{
		return (int)23;
	}
}
