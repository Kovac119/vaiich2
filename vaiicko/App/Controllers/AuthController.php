<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\User;


/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("admin.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);

    }

    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }
    public function registerUser()
    {
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
