
<?php

class users
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(string $name, string $email): bool
    {
        $sql = "INSERT INTO users (name, email)
                VALUES (:name, :email)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'name' => $name,
            'email' => $email
        ]);
    }

    public function searchUser(int $id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers(): array
    {
        $sql = "SELECT * FROM users";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function validateUser(string $name, string $email): bool
    {
        return trim($name) !== ''
            && filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function searchByEmail(string $email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
