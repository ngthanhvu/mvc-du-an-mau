<?php
class User
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);

        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public function DeleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = $id";
        $this->db->query($sql);
    }

    public function AddUser($username, $password, $full_name, $level)
    {
        // $sql = "INSERT INTO users (username, password, full_name, level) VALUES ('$username', '$password', '$full_name', '$level')";
        // $this->db->query($sql);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $level = $_POST['level'];
            $sql = "INSERT INTO users (username, password, full_name, level) VALUES ('$username', '$password', '$full_name', '$level')";
            $this->db->query($sql);
        }
    }

}
