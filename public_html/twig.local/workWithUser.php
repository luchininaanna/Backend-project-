<?php

function GetUsersFromDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schedule_service";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $query = $conn->prepare('SELECT * FROM user');
    $query->execute();
    $rawFromBD = $query->get_result();

    $query->close();

    return $rawFromBD;
}

function GetUser($login, $password) {

    $rawFromBD = GetUsersFromDB();

    $idRegisteredUser = 0;

    if($rawFromBD)
    {
        $rows = mysqli_num_rows($rawFromBD); // количество полученных строк

        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($rawFromBD);

            if ($row[1] == $login && $row[2] == $password)
            {
                //echo "Пользователь найден ";
                $idRegisteredUser = $row[0];
            }

            /* печать полученных данных
            for ($j = 0 ; $j < 6 ; ++$j)
            {
                echo "$row[$j]";
                echo "   ";
            }
            echo "\n";
            */
        }
    }

    return $idRegisteredUser;
}

function PushNewUser($result) {
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

    $sql = "INSERT INTO user
            (login, password, first_name, last_name, email_address)
            VALUES ('$result[username]', '$result[password_1]', '$result[first_name]', 
            '$result[last_name]','$result[email]')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /index.php");
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function CheckDataAboutUser($result) {
    $isEmptyString = False;

    foreach ($result as &$value) {
        if ($value == "") {
            $isEmptyString = True;
        }
    }

    return !($isEmptyString);
}

function CreateNewUser($result) {
    //echo "++++++++++++++++";
    if ($result['password_1'] == $result['password_2']) {
        //echo "------------------";
        $idUserWithThisData = GetUser($result['username'], $result['password_1']);
        $isCorrectDataAboutUser = CheckDataAboutUser($result);

        if ($isCorrectDataAboutUser) {
            echo "++++";
        }

        echo ($idUserWithThisData);

        if ($idUserWithThisData == 0)
        {
            PushNewUser($result);
        }
        else {
            echo "Такой пользователь уже есть";
        }
    }
    else {
        echo("different passwords");
    }
}