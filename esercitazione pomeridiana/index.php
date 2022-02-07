<?php
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Department.php';


// QUERY
$sql = 'SELECT * FROM `departments`';
// SAVING QUERY'S ANSWER INTO A VARIABLE
$result = $connection->query($sql);

// SAVING $RESULT'S CONTENT INTO AN ARRAY
if ($result && $result->num_rows > 0){
    $departments=[];
    while ($row = $result->fetch_assoc()){
        $department = new Department();
        $department->id = $row['id'];
        $department->name = $row['name'];
        $department->website = $row['website'];
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
                <a href="department-details.php?id=<?php echo $single_department->id ?>">
                    <h2><?php echo $single_department->name; ?></h2>
                </a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
