<?php
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Department.php';

$sql = $connection->prepare('SELECT * FROM `departments` WHERE id= ?'); 
$sql->bind_param("d", $id);
$id = $_GET['id'];
$sql->execute();
$result = $sql->get_result();

if ($result && $result->num_rows > 0){
    $departments=[];
    while ($row = $result->fetch_assoc()){
        $department = new Department();
        $department->id = $row['id'];
        $department->name = $row['name'];
        $department->email = $row['email'];
        $department->adress = $row['address'];
        $departments[] = $department;
    }
}elseif ($result && $result->num_rows == 0){
    // The database returned 0 rows and nothing shows
}else{
    echo 'errore';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Departments:</h1>

    <ul>
        <?php foreach($departments as $single_department){ ?>
            <li>
                <h2><?php echo $single_department->name ?></h2>
                <div><?php echo $single_department->email ?></div>
                <div><?php echo $single_department->adress ?></div>
            </li>
        <?php } ?>
    </ul>
</body>
</html>