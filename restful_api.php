<?php
header("Content-Type: application/json");

// Koneksi database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "sistem_manajemen";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

//  Buat yang ini nyoba restful api, contohnya
//  http://localhost/restful_api.php?url=users/2


// Parsing URL
$url = isset($_GET['url']) ? explode('/', trim($_GET['url'], '/')) : [];
$table = $url[0] ?? null; // Nama tabel (products, users, admin, transactions)
$id = $url[1] ?? null;   // ID data (jika ada)

// Validasi nama tabel
$allowedTables = ["admin", "products", "transactions", "users"];
if (!$table || !in_array($table, $allowedTables)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid or missing table name"]);
    exit;
}

// Mendapatkan metode HTTP
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGet($conn, $table, $id);
        break;

    case 'POST':
        handlePost($conn, $table);
        break;

    case 'PUT':
        handlePut($conn, $table, $id);
        break;

    case 'DELETE':
        handleDelete($conn, $table, $id);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
}

$conn->close();

// Fungsi untuk GET
function handleGet($conn, $table, $id)
{
    if ($id) {
        $stmt = $conn->prepare("SELECT * FROM `$table` WHERE id = ?");
        $stmt->bind_param("i", $id);
    } else {
        $stmt = $conn->prepare("SELECT * FROM `$table`");
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $id ? $result->fetch_assoc() : $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    } else {
        echo json_encode(["message" => "No data found"]);
    }
}

// Fungsi untuk POST
function handlePost($conn, $table)
{
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid input"]);
        return;
    }

    $columns = implode(',', array_keys($data));
    $placeholders = implode(',', array_fill(0, count($data), '?'));
    $values = array_values($data);
    $types = str_repeat('s', count($data));

    $stmt = $conn->prepare("INSERT INTO `$table` ($columns) VALUES ($placeholders)");
    $stmt->bind_param($types, ...$values);
    $success = $stmt->execute();

    echo json_encode(["success" => $success, "insert_id" => $stmt->insert_id]);
}

// Fungsi untuk PUT
function handlePut($conn, $table, $id)
{
    if (!$id) {
        http_response_code(400);
        echo json_encode(["error" => "No ID specified for update"]);
        return;
    }

    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid input"]);
        return;
    }

    $set = [];
    $values = [];
    foreach ($data as $key => $value) {
        $set[] = "`$key` = ?";
        $values[] = $value;
    }
    $setString = implode(', ', $set);
    $values[] = $id;
    $types = str_repeat('s', count($data)) . 'i';

    $stmt = $conn->prepare("UPDATE `$table` SET $setString WHERE id = ?");
    $stmt->bind_param($types, ...$values);
    $success = $stmt->execute();

    echo json_encode(["success" => $success, "affected_rows" => $stmt->affected_rows]);
}

// Fungsi untuk DELETE
function handleDelete($conn, $table, $id)
{
    if (!$id) {
        http_response_code(400);
        echo json_encode(["error" => "No ID specified for delete"]);
        return;
    }

    $stmt = $conn->prepare("DELETE FROM `$table` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();

    echo json_encode(["success" => $success, "affected_rows" => $stmt->affected_rows]);
}
