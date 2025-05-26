<?php

$connections = mysqli_connect("localhost", "root", "", "rms_db");
if (mysqli_connect_errno()) {

    echo "Failed to Connect to mysqli:" . mysqli_connect_error();
} else {

    echo "";
}
