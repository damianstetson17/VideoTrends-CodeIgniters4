<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfileModel;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        session()->destroy();
        $data['header'] = view('/templates/header');
        $data['footer'] = view('/templates/footer');
        return view('login', $data);
    }

    public function login()
    {
        $session = session();
        $data['header'] = view('/templates/header');
        $data['footer'] = view('/templates/footer');

        $rules = [
            'email' => 'required|min_length[6]|max_length[191]',
            'password' => 'required|min_length[4]|max_length[255]|validateUser[email,password]',
        ];

        $errors = [
            'password' => [
                'validateUser' => 'El email o contraseña son incorrectas.'
            ]
        ];

        //if success user's login
        if ($this->validate($rules, $errors)) {
            //delete garbage msgs in session
            $session = session();
            $session->remove('success');
            $session->remove('error');
            $session->remove('validationErrors');

            $user = new UserModel();
            $profile = new ProfileModel();

            $dataUser = $user->where('email', $this->request->getVar('email'))->first();
            $dataProfile = $profile->where('users_fk_id', $dataUser['id'])->first();
            $data = [
                'footer' => view('/templates/footer'),
                'user_id' => $dataUser['id'],
                'user_email' => $dataUser['email'],
                'profile_id' => $dataProfile['id'],
                'profile_name' => $dataProfile['name']
            ];
            $session->set($data);

            return view('home', $data);
        } else {
            $session->set(['validationErrors' => $this->validator]);
            return view('login', $data);
        }
    }

    public function checkEmail()
    {
        $user = new UserModel();
        $reqEmail = $this->request->getVar('email');
        $dataUser = $user->where('email', $reqEmail)->first();
        if (count((array)$dataUser) > 0) {
            $result = [
                'requestedEmail'    =>  $reqEmail,
                'isUsed'            =>  true
            ];
        } else {
            $result = [
                'requestedEmail'    =>  $reqEmail,
                'isUsed'            =>  false
            ];
        }

        return $this->respond($result, 200);
    }
}
