<?php
//connection test
if ($conn->connect_error) {
    echo "Connection error: " . $conn->connect_error;
} else {
    echo "Connect successful";
}