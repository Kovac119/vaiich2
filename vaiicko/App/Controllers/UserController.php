<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class UserController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {

    }

    public function registerUser()
    {
        if (strlen($this->request()->getValue('username'))<3 || strlen($this->request()->getValue('username'))<3) {
            $data = ['message' => 'Username must be 3-15 characters long.'];
            return $this->redirect("?c=user&a=register");
        }
        if (strlen($this->request()->getValue('password'))<5 || strlen($this->request()->getValue('password'))<3) {
            $data = ['message' => 'Password must be 5-15 characters long.'];
            return $this->redirect("?c=user&a=register");
        }
        $user = new User();
        $username = $this->request()->getValue('username');
        $user->setUsername($username);
        $password = $this->request()->getValue('password');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user->setPassword($hashedPassword);
        $filteredUser = User::getAll("username = ?", [ $username ]);
        if ($filteredUser == null) {
            $user->save();
            //$data = "Success!";
            return $this->redirect("?c=auth&a=login");
        } else {
            //$data = "This username is already taken!";
            //return $this->redirect("?c=user&a=create&fail=true");
        }
    }

    public function register(): Response
    {
        return $this->html();
    }
}