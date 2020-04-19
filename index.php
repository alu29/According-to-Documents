<?php

if (substr($_SERVER['HTTP_HOST'],0,3)!="www")
{
  header("Location: https://www.".$_SERVER['HTTP_HOST'].$_SERVER[REQUEST_URI]);
}

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'main.php';
        break;
    case '/getfromsheet':
        require 'CSVtoFirestore.php';
        break;
    // case '/archive':
    //     require 'archive.php';
    //     break;
    default:
        http_response_code(404);
        exit('Not Found');
}

?>
