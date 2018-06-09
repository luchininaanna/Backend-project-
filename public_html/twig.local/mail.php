<?php

$isAllComponents = isset($_POST["date"]) && isset($_POST["event_name"])
    && isset($_POST["select_time_type"]) && isset($_POST["start_time"])
    && isset($_POST["select_priority"]);

if ($_POST["select_time_type"] == "range") {
    $isAllComponents = $isAllComponents && isset($_POST["finish_time"]);
}

if ($isAllComponents) {

    // Формируем массив для JSON ответа
    $result = array(
        'date' => $_POST["date"],
        'event_name' => $_POST["event_name"],
        'select_time_type' => $_POST["select_time_type"],
        'start_time' => $_POST["start_time"],
        //'finish_time' => $_POST["finish_time"],
        'select_priority' => $_POST["select_priority"]
    );

    var_dump($result);

    //отправить данные в базу данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schedule_service";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    var_dump($conn->connect_error);

    $sql = "INSERT INTO schedule
            (id_user, event_name, start_range_of_event_date_start_time, 
            end_range_of_event_date_start_time, is_exact_time, 
            current_event_start_time, current_event_end_time,
            priority)
            VALUES (1, '$result[event_name]', '$result[date]', '$result[date]',
            1, '$result[date]', '$result[date]', 1)";

    echo($sql);

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } //else {
    //   echo "Error: " . $sql . "<br>" . $conn->error;
    //}

    $conn->close();
} else {
    die('not all components');
}
