<?php

include 'header.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'home':
            include 'home.php';
            break;
            case 'about':
                include 'about.php';
                break;
                case 'contact':
                    include 'contact.php';
                    break;
            
            default:
            include 'home.php';
            break;
        }
    } else {
    include 'home.php';
}