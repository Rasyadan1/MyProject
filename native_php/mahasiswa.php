<?php
require 'connect.php';

header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // GET all
        $result = $conn->query("SELECT * FROM mahasiswa");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(['status' => true, 'data' => $data]);
        break;

    case 'POST':
        // INSERT
        $input = json_decode(file_get_contents("php://input"), true);
        $nim = $input['nim'] ?? '';
        $nama = $input['nama'] ?? '';
        $no_hp = $input['no_hp'] ?? '';

        if ($nim && $nama && $no_hp) {
            $stmt = $conn->prepare("INSERT INTO mahasiswa (nim, nama, no_hp) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nim, $nama, $no_hp);
            $stmt->execute();
            echo json_encode(['status' => true, 'message' => 'Data berhasil ditambahkan']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Data tidak lengkap']);
        }
        break;

    case 'PUT':
        // UPDATE by id
        $input = json_decode(file_get_contents("php://input"), true);
        $id    = $input['id'] ?? null;
        $nim   = $input['nim'] ?? '';
        $nama  = $input['nama'] ?? '';
        $no_hp = $input['no_hp'] ?? '';

        if ($id && $nim && $nama && $no_hp) {
            $stmt = $conn->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, no_hp = ? WHERE id = ?");
            $stmt->bind_param("sssi", $nim, $nama, $no_hp, $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo json_encode(['status' => true, 'message' => 'Data berhasil diupdate']);
            } else {
                echo json_encode(['status' => true, 'message' => 'Tidak ada perubahan data']);
            }
        } else {
            echo json_encode(['status' => false, 'message' => 'Data tidak lengkap']);
        }
        break;

    case 'DELETE':
        // DELETE by id
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'] ?? null;

        if ($id) {
            $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Data tidak ditemukan']);
            }
        } else {
            echo json_encode(['status' => false, 'message' => 'ID tidak diberikan']);
        }
        break;

    default:
        echo json_encode(['status' => false, 'message' => 'Method tidak diizinkan']);
        break;
}
