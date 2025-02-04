<?php
class Post extends Controller
{
    private $user_model;
    private $post_model;
    public function __construct()
    {
        $this->user_model = $this->createModel("UserModel");
        $this->post_model = $this->createModel("PostModel");
    }
    public function index()
    {
        $data['jss'] = [];
        $data['csss'] = [];
        $data['title'] = 'Bảng tin';
        $data['content'] = 'posts/index';

        $data['data']['posts'] = $this->post_model->readPosts();
        $data["data"]["state"] = 1;
        $this->render('layouts/default', $data);
    }
    public function myPost()
    {
        $data['jss'] = [];
        $data['csss'] = [];
        $data['title'] = 'Bài đăng của bạn';
        $data['content'] = 'posts/my-post';

        $data['data']['posts'] = $this->post_model->readPosts();
        $data["data"]["state"] = 2;
        $this->render('layouts/default', $data);
    }
    public function read($id = '')
    {
        if (empty($id)) {
            header('Location:' . DOMAIN);
            exit;
        }

        $post = $this->post_model->readPost($id);

        if (empty($post)) {
            header('Location:' . DOMAIN);
            exit;
        }

        $data['jss'] = [];
        $data['csss'] = ['read'];
        $data['title'] = $post['title'];
        $data['content'] = 'posts/read';
        $data['description'] = 'Quay lại với người yêu cũ 30 lần';
        $data['thumbnail'] = $post['image'];

        $data['data']['state'] = 1;
        $data['data']['post'] = $post;
        $this->render('layouts/default', $data);
    }
    public function update($id = '')
    {
        if (empty($id) || empty($_SESSION['id'])) {
            header('Location: ' . DOMAIN . 'user/');
            exit;
        }

        $user_id = $_SESSION['id'];

        $post = $this->post_model->readPost($id);

        if ($user_id !== $post['author']) {
            echo 'Không có quyền truy cập';
            exit;
        }

        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            if (!empty($_POST['image'])) {
            }
            $post_data['title'] = $_POST['title'];
            $post_data['content'] = $_POST['content'];

            $result = $this->post_model->updatePost($id, $post_data);

            if ($result) {
                header('Location:' . DOMAIN . 'user');
                exit;
            }
        }

        $data['jss'] = [];
        $data['csss'] = ['update'];
        $data['title'] = "Chỉnh sửa";
        $data['content'] = 'posts/update';

        $data['data']['state'] = 4;
        $data['data']['post'] = $post;
        $this->render('layouts/default', $data);

    }
    public function delete($id = '')
    {
        if (empty($id) || empty($_SESSION['id'])) {
            header('Location: ' . DOMAIN . 'user/');
            exit;
        }
    }
}