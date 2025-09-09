<?php
// classes/Parcel.php - Parcel Management Class
class Parcel
{
    private $conn;
    private $table_name = "parcels";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function generateTrackingNumber()
    {
        return 'TRK' . strtoupper(uniqid());
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET tracking_number=:tracking_number, sender_name=:sender_name, 
                      receiver_name=:receiver_name, origin=:origin, destination=:destination, 
                      status=:status, created_at=NOW(), last_update=NOW()";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":tracking_number", $data['tracking_number']);
        $stmt->bindParam(":sender_name", $data['sender_name']);
        $stmt->bindParam(":receiver_name", $data['receiver_name']);
        $stmt->bindParam(":origin", $data['origin']);
        $stmt->bindParam(":destination", $data['destination']);
        $stmt->bindParam(":status", $data['status']);

        return $stmt->execute();
    }

    public function findByTrackingNumber($tracking_number)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE tracking_number = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $tracking_number);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($limit = 50)
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC LIMIT ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table_name . " 
                  SET sender_name=:sender_name, receiver_name=:receiver_name, 
                      origin=:origin, destination=:destination, status=:status, 
                      last_update=NOW() WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":sender_name", $data['sender_name']);
        $stmt->bindParam(":receiver_name", $data['receiver_name']);
        $stmt->bindParam(":origin", $data['origin']);
        $stmt->bindParam(":destination", $data['destination']);
        $stmt->bindParam(":status", $data['status']);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function getStats()
    {
        $stats = [];

        // Total parcels
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stats['total'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Status counts
        $statuses = ['Pending', 'In Transit', 'Out for Delivery', 'Delivered'];
        foreach ($statuses as $status) {
            $query = "SELECT COUNT(*) as count FROM " . $this->table_name . " WHERE status = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $status);
            $stmt->execute();
            $stats[strtolower(str_replace(' ', '_', $status))] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        }

        return $stats;
    }
}
?>