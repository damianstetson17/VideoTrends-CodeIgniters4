<?php
namespace App\Validations;
use App\Models\UserModel;

class UserRules
{
  public function validateUser(string $str, string $fields, array $data)
  {
    $user = new UserModel();
    $dataUser = $user->where('email', $data['email'])
                  ->first();
    
    //if exist a user with email
    if(!isset($dataUser))
    {
      return false;
    }
    
    return password_verify($data['password'], $dataUser['password']);
  }
}
