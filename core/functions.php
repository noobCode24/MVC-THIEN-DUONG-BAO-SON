<?php
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') return true;
    return false;
}

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') return true;
    return false;
}

function filter()
{
    $filterArr = [];
    if (isGet()) {
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    if (isPost()) {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    return $filterArr;
}

// Validate data trong PHP

function isEmail($email)
{
    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $checkEmail;
}

function isPhone($phone)
{
    $check = false;
    if ($phone[0] == '0') $check = true;
    if (!$check) return false;
    $phone = substr($phone, 1);
    if (isInt($phone)) return true;
    if (strlen(trim($phone)) == 9) return true;
    return false;
}

function isInt($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
    return $checkNumber;
}

function isFloat($number)
{
    if (isInt($number)) return isInt($number);
    $checkNumber = filter_var($number, FILTER_VALIDATE_FLOAT);
    return $checkNumber;
}


function checkPassword($password, $data)
{
    return password_verify($password, password_hash($data, PASSWORD_DEFAULT));
}

function getSmg()
{
    $msg = getFlashData('msg');
    $type_msg = getFlashData('type_msg');
    $x = getFlashData('title');
    $text = '';
    if(!empty($x)) $text = $x;

    if (!empty($msg)) {
        echo '
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal({
                    title: "' . $msg . '",
                    text: "'.$text.'",
                    icon: "' . $type_msg . '",
                    button: "Đóng",
                    });
            </script>
        ';
        // echo '<div class="message text-center w-50 m-auto mt-3 alert alert-' . $type_msg . '">' . $msg . '</div>';
    }
}

// function handelImage($keyFile, $path)
// {
//     $image = $_FILES[$keyFile];
//     if (!empty($image['name'])) {
//         echo '<pre>';
//         print_r($image);
//         echo '</pre>';
//         $extend = '.jpg';
//         if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
//         $fileName = time() . $extend;
//         move_uploaded_file(
//             $_FILES['new_image']['tmp_name'],
//             'C:\xampp\htdocs\MVC\public\assets'.' \ ' . $path . $fileName
//         );
//         $fileName = 'new-' . $fileName;
//         return $fileName;
//     }
// }


function redirect($path = 'index.php')
{
    header("Location: $path");
    exit;
}

function back()
{
}

function loadError($error = '404')
{
    require_once 'app/Errors/' . $error . '.php';
}


function getAlert($alert)
{
    echo '
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("' . $alert . '", "", "error");
    </script>
    ';
}
