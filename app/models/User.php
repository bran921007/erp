<?php 
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Collection;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
