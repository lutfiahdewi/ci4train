<?php
 
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
 
class Register extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
			'username' => 'is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'confpassword' => 'matches[password]'
        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $data = [
            'username'     => $this->request->getVar('username'),
			'name'     => $this->request->getVar('name'),
			'email'     => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
			//'role'     => $this->request->getVar('role')			
        ];
        $model = new UserModel();
        $registered = $model->save($data);
        $this->respondCreated($registered);
    }
}
