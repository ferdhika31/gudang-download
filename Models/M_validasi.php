<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 22:31:52
	**/
namespace Models;
use Resources;

class M_validasi extends Resources\Validation {
    
    public function setRules()
    {
        return array(
            'name' => array(
                'rules' => array(
                    'required',
                    'min' => 3
                ),
                'label' => 'Full Name',
                'filter' => array('trim', 'strtolower', 'ucwords')
            ),
            'username' => array(
                'rules' => array(
                    'required',
                    'min' => 3,
                    'max' => 10,
                    'regex' => '/^([-a-z0-9_-])+$/i',
                    'callback' => 'usernameExists'
                ),
                'label' => 'Username',
                'filter' => array('trim', 'strtolower')
            ),
            'email' => array(
                'rules' => array(
                    'required',
                    'min' => 3,
                    'email',
                    'callback' => 'emailExists'
                ),
                'label' => 'Email',
                'filter' => array('trim', 'strtolower')
            ),
            'password' => array(
                'rules' => array(
                    'required',
                    'min' => 5,
                    'compare' => 'repassword'
                ),
                'label' => 'Password'
            ),
            'repassword' => array(
                'rules' => array(
                    'required'
                ),
                'label' => 'Retype Password'
            ),
            'photo' => array(
                'rules' => array(
                    'file'
                ),
                'label' => 'Profile Pic'
            )
        );
    }
    
    public function usernameExists($field, $value, $label)
    {
        if( $value != 'admin' )
            return true;
        $this->setErrorMessage($field, 'Username already exists.');
        return false;
    }
    
    public function emailExists($field, $value, $label)
    {
        if( $value != 'admin@site.com' )
            return true;
        
        $this->setErrorMessage($field, 'Email already exists.');
        
        return false;
    }
}