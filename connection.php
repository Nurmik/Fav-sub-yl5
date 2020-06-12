<?php

$mysqli = new mysqli(
    "x",
    "x",
    "x",
    "x"
);
/* check connection */
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
