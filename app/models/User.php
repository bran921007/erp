<?php 
use Illuminate\Database\Eloquent\Collection;


class User extends Illuminate\Foundation\Auth\User {



	protected $table = 'users';
	protected $fillable = ['id','nombre','apellido','email','password','direccion','cedula','nivel','estado','created_at','updated_at'];

	
    protected $hidden = array('password', 'remember_token');

    public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

}
