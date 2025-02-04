<?php
class UserModel extends Model
{
    public function register($data)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE phone_number=:phone_number";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':phone_number', $data['phone_number']);
            $stmt->execute();

            if ($stmt->fetchColumn() > 0) {
                return [
                    'status' => 'error',
                    'title' => 'Đăng ký thất bại',
                    'content' => 'Số điện thoại đã tồn tại',
                ];
            }

            if ($this->create('users', $data)) {
                return [
                    'status' => 'success',
                    'title' => 'Đăng ký thành công',
                    'content' => 'Chuyển trang sau 3 giây',
                ];
            } else {
                return [
                    'status' => 'error',
                    'title' => 'Đăng ký thất bại',
                    'content' => 'Hãy thử lại sau',
                ];
            }
        } catch (PDOException $e) {
            echo "[REGISTER] {$e->getMessage()}";
            return [
                'status' => 'error',
                'title' => 'Có lỗi xảy ra',
                'content' => $e->getMessage(),
            ];
        }
    }
    public function login($phone_number, $password)
    {
        try {
            $conditions = "phone_number=$phone_number";
            $users = $this->read('users', $conditions);

            if (!empty($users)) {
                if (password_verify($password, $users[0]['password'])) {
                    $_SESSION['id'] = $users[0]['id'];
                    return [
                        'status' => 'success',
                        'title' => 'Đăng nhập thành công',
                        'content' => 'Chuyển hướng sau 3 giây',
                    ];
                } else {
                    return [
                        'status' => 'error',
                        'title' => 'Đăng nhập thất bại',
                        'content' => 'Mật khẩu không chính xác',
                    ];
                }
            } else {
                return [
                    'status' => 'error',
                    'title' => 'Đăng nhập thất bại',
                    'content' => 'Số điện thoại không tồn tại',
                ];
            }
        } catch (PDOException $e) {
            echo "[LOGIN] {$e->getMessage()}";
            return [
                'status' => 'error',
                'title' => 'Đăng nhập thất bại',
                'content' => $e->getMessage(),
            ];
        }
    }
    public function readUser($id)
    {
        $conditions = "id=$id";
        $users = $this->read("users", $conditions);
        return $users[0];
    }
}