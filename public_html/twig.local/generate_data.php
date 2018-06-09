<?php

require_once 'vendor/autoload.php';

use Faker\Factory as Faker;

$faker = Faker::create('en_US');

for ($i = 0; $i < 900; $i++) {

        $data = [
            'id_student'  => $faker->numberBetween(1, 480),
            'id_class'  => $faker->numberBetween(1, 300),
            'mark'  => $faker->numberBetween(1, 5),

        ];
        print_r($data);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "university_data";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO mark
            (id_student, id_class, mark)
            VALUES ($data[id_student], $data[id_class], $data[mark])";

        echo $sql;

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

}

$conn->close();


