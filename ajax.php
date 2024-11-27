<?php
ob_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if ($action == 'login') {
    // Validate password before proceeding to the login method
    if (!isset($_POST['password']) || !preg_match('/(?=.*\d)|(?=.*[\W_])/', $_POST['password'])) {
        echo json_encode(['error' => 'Password must include at least one number or special character.']);
        exit;
    }
    $login = $crud->login();
    if ($login) {
        echo $login;
    }
}

if ($action == 'login2') {
    // Validate password before proceeding to the login2 method
    if (!isset($_POST['password']) || !preg_match('/(?=.*\d)|(?=.*[\W_])/', $_POST['password'])) {
        echo json_encode(['error' => 'Password must include at least one number or special character.']);
        exit;
    }
    $login = $crud->login2();
    if ($login) {
        echo $login;
    }
}

if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'save_project'){
	$save = $crud->save_project();
	if($save)
		echo $save;
}
if($action == 'delete_project'){
	$save = $crud->delete_project();
	if($save)
		echo $save;
}
if($action == 'save_task'){
	$save = $crud->save_task();
	if($save)
		echo $save;
}
if($action == 'delete_task'){
	$save = $crud->delete_task();
	if($save)
		echo $save;
}
if($action == 'save_progress'){
	$save = $crud->save_progress();
	if($save)
		echo $save;
}
if($action == 'delete_progress'){
	$save = $crud->delete_progress();
	if($save)
		echo $save;
}
if($action == 'get_report'){
	$get = $crud->get_report();
	if($get)
		echo $get;
}
ob_end_flush();
?>