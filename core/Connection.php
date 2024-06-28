<?php
try {
    if (class_exists('PDO')) {
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST;
        $conn = new PDO(
            $dsn,
            _USER,
            _PASS,
            $option
        );
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    die();
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (
    isset($data['user']) &&
    !empty($data['user']['address']) &&
    !empty($data['user']['country']) &&
    !empty($data['user']['email']) &&
    !empty($data['user']['full_name']) &&
    !empty($data['user']['id_Number']) &&
    !empty($data['user']['phone_number']) &&
    isset($data['booking']) &&
    isset($data['booking_date']) &&
    isset($data['date_of_use'])
) {
    try {
        // Giải mã JSON và lấy dữ liệu user và booking từ POST
        $user = $data['user'];
        $booking = $data['booking'];
        $booking_date = $data['booking_date'];
        $date_of_use = $data['date_of_use'];

        // Bắt đầu transaction
        $conn->beginTransaction();

        // Ví dụ: chèn dữ liệu user vào bảng customers
        $sql = "INSERT INTO customers(full_name, email, phone_number, country, address, id_Number) 
        VALUES(:full_name, :email, :phone_number, :country, :address, :id_Number)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':full_name' => $user['full_name'],
            ':email' => $user['email'],
            ':phone_number' => $user['phone_number'],
            ':country' => $user['country'],
            ':address' => $user['address'],
            ':id_Number' => $user['id_Number'],
        ]);

        // Lấy id của khách hàng vừa chèn
        $customerId = $conn->lastInsertId();


        // Chèn dữ liệu vào bảng booking
        $sql = "INSERT INTO booking(customer_id, booking_date, date_of_use, total_price) 
         VALUES(:customer_id, :booking_date, :date_of_use, :total_price)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':customer_id' => $customerId,
            ':booking_date' => $booking_date,
            ':date_of_use' => $date_of_use,
            ':total_price' => $booking['totalPrice'],
        ]);

        // Lấy id của bản ghi booking vừa chèn
        $bookingId = $conn->lastInsertId();

        if (isset($booking['tickets']) && is_array($booking['tickets'])) {
            foreach ($booking['tickets'] as $ticket) {
                if (!isset($ticket['title']) || !isset($ticket['quantity']) || !isset($ticket['price'])) {
                    throw new Exception('Dữ liệu vé không hợp lệ: ' . json_encode($ticket));
                }

                $sql = "SELECT ticket_id FROM ticket WHERE ticket_name = :ticket_name";
                $stmt = $conn->prepare($sql);
                $stmt->execute([':ticket_name' => $ticket['title']]);
                $ticket_id = $stmt->fetchColumn();

                if ($ticket_id === false) {
                    // Xử lý nếu ticket không tồn tại
                    throw new Exception('ticket_name không tồn tại trong bảng ticket: ' . $ticket['title']);
                }

                // Chèn dữ liệu vào bảng booking_detail
                $sql = "INSERT INTO booking_detail(booking_id, ticket_id, quantity, price) 
                VALUES(:booking_id, :ticket_id, :quantity, :price)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':booking_id' => $bookingId,
                    ':ticket_id' => $ticket_id,
                    ':quantity' => $ticket['quantity'],
                    ':price' => $ticket['price'],
                ]);
            }
        }

        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Chèn dữ liệu thành công']);
    } catch (Exception $e) {
        // Nếu có lỗi, rollback transaction
        $conn->rollBack();
        $e->getMessage();
    }
}
