<?php
class User extends Controller
{
    private $user_model;
    private $post_model;
    public function __construct()
    {
        $this->user_model = $this->createModel("UserModel");
        $this->post_model = $this->createModel('PostModel');
    }
    public function index()
    {
        if (empty($_SESSION['id'])) {
            header('Location: ' . DOMAIN . 'user/login');
            exit;
        }

        $user_id = $_SESSION['id'];

        $user = $this->user_model->readUser($user_id);
        $posts = $this->post_model->readPosts($user_id);


        $data['jss'] = [];
        $data['csss'] = ['user'];
        $data['title'] = 'Hồ sơ cá nhân';
        $data['content'] = 'users/index';

        $data['data']['state'] = 4;
        $data['data']['user'] = $user;
        $data['data']['posts'] = $posts;
        $this->render('layouts/default', $data);
    }
    public function login()
    {
        if (!empty($_SESSION['id'])) {
            header('Location: ' . DOMAIN . 'user/');
            exit;
        }

        $data['jss'] = ['login'];
        $data['csss'] = ['user'];
        $data['title'] = 'Đăng nhập';
        $data['content'] = 'users/login';

        $data['data']['state'] = 4;
        $data['data']['phone_number'] = '';
        $data['data']['password'] = '';
        $data['data']['msg'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['phone_number']) && !empty($_POST['password'])) {
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $result = $this->user_model->login($phone_number, $password);

                $data['data']['phone_number'] = $phone_number;
                $data['data']['password'] = $password;
                $data['data']['msg'] = $result;
            }
        }
        $this->render('layouts/default', $data);
    }
    public function register()
    {
        $data['jss'] = ['register'];
        $data['csss'] = ['user'];
        $data['title'] = 'Đăng ký tài khoản';
        $data['content'] = 'users/register';

        $data['data']['state'] = 4;
        $data['data']['full_name'] = '';
        $data['data']['phone_number'] = '';
        $data['data']['password'] = '';
        $data['data']['msg'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['full_name']) && !empty($_POST['phone_number']) && !empty($_POST['password'])) {
                $register_data = [
                    'full_name' => $_POST['full_name'],
                    'phone_number' => $_POST['phone_number'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];
                $data['data'] = [
                    'full_name' => $_POST['full_name'],
                    'phone_number' => $_POST['phone_number'],
                    'password' => $_POST['password'],
                    'msg' => $this->user_model->register($register_data),
                ];
            }
        }
        $this->render('layouts/default', $data);
    }
}