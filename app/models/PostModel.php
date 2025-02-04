<?php
class PostModel extends Model
{
    public function createPost($data)
    {
        return $this->create("posts", $data);
    }
    public function readPost($id = '')
    {
        $sql = "SELECT p.*, u.full_name, u.avatar
        FROM posts p JOIN users u
        ON p.author = u.id
        WHERE p.id=:id";

        if (!isset($this->conn)) {
            return [];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            return $post;
        } catch (PDOException $e) {
            echo "[READPOSTWITHID] {$e->getMessage()}";
            return [];
        }

    }
    public function readPosts($id = '')
    {
        $sql = "SELECT p.id, p.title, p.content, p.image, p.create_at , 
                u.full_name AS author_name, u.avatar
                FROM posts p
                JOIN users u ON p.author = u.id";

        if (!isset($this->conn)) {
            return [];
        }

        if (!empty($id)) {
            $sql .= " WHERE p.author=:id";
        }

        $sql .= " ORDER BY p.create_at DESC";

        try {
            $stmt = $this->conn->prepare($sql);

            if (!empty($id)) {
                $stmt->bindValue(":id", $id);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "[READWITHAUTHOR] {$e->getMessage()}";
            return [];
        }
    }
    public function updatePost($id, $data)
    {
        $conditions = "id=$id";
        return $this->update("posts", $data, $conditions);
    }
    public function deletePost($id)
    {
        $conditions = "id=$id";
        return $this->delete("posts", $conditions);
    }
}