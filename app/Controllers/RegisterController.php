<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CountryModel;
use App\Models\ProvinceModel;
use App\Models\CityModel;
use App\Models\AddressModel;
use App\Models\ProfileModel;

class RegisterController extends BaseController
{
    public function index()
    {
        //delete garbage msgs in session
        $session = session();
        $session->remove('success');
        $session->remove('error');
        $session->remove('validationErrors');

        $countries = new CountryModel();
        $provinces = new ProvinceModel();
        $cities = new CityModel();

        $data = [
            'header'    => view('/templates/header'),
            'footer'    => view('/templates/footer'),
            'countries' => $countries->findAll(),
            'provinces' => $provinces->findAll(),
            'cities'    => $cities->findAll(),
        ];
        return view('register', $data);
    }

    public function registration(){
        $session = session();
        $user = new UserModel();
        //verify that no user exists with the email address
        $supposedNewEmail = $this->request->getVar('email');
        $supposedNewUser = $user->where('email', $supposedNewEmail)->first();
        if(count((array)$supposedNewUser) > 0){
            $data['error'] = "El correo ya pertenece a un usuario existente.";
            $session->set($data);
            return redirect()->to('/');
        }

        //create a user
        $newUserData = [
            'email'     => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        $user->save($newUserData);
        $userID = $user->insertID;

        //create a profile's address
        $address = New AddressModel();
        $newAddressData = [
            'street'            =>  $this->request->getVar('street'),
            'number'            =>  $this->request->getVar('number'),
            'latitude'          =>  $this->request->getVar('lat'),
            'longitude'         =>  $this->request->getVar('long'),
            'cities_fk_id'      =>  $this->request->getVar('city'),
            'provinces_fk_id'   =>	$this->request->getVar('province'),
            'countries_fk_id'   =>  $this->request->getVar('country')	
        ];
        $address->save($newAddressData);
        $addressID = $address->insertID;

        //create a user's profile
        $profile = new ProfileModel();
        $newProfileData = [
            'name'              =>  $this->request->getVar('name')." ".$this->request->getVar('secondName'),
            'phone'             =>  $this->request->getVar('phone'),
            'birthdate'         =>  $this->request->getVar('datebirth'),
            'webpage'           =>  $this->request->getVar('web'),
            'users_fk_id'       =>  $userID,
            'addresses_fk_id'   =>  $addressID
        ];
        $profile->save($newProfileData);

        $data['success'] = 'Se ha registrado con exito.';
        $session->set($data);

        return redirect()->to('/');
    }
}