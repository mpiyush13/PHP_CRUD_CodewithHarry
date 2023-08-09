<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// readfile("text.txt");


// $fptr = fopen("text.txt", "r");
// // echo var_dump($fptr);
// if(!$fptr){
//     die("Unable to open this file.Please enter a valid filename");
// }
// $content = fread($fptr, filesize("text.txt"));
// fclose($fptr);
// echo $content;


// Reading a file line by line
// $fptr = fopen("text.txt", "r");
// while($a=fgets($fptr)){
//     echo $a;
// }
// echo "End of the file has been reached";

// Reading a file character by character
// $fptr = fopen("text.txt", "r");
// while($a=fgetc($fptr)){
//     echo $a;
//    if($a=="t")break;
    
// }
// echo "End of the file has been reached";
// echo getcwd();
// $fptr = fopen("/Applications/XAMPP/xamppfiles/htdocs/Php_Test/text.txt", "r");
// fwrite($fptr, "This is the best file on this planet. Please dont argue with me on this one.\n"); 
 



// Writing to a file in php
echo "Welcome to write files in php";
$fptr = fopen("text.txt", "w");
fwrite($fptr, "This is the best file on this planet. Please dont argue with me on this one.\n"); 
fwrite($fptr, "This is another content\n"); 
fwrite($fptr, "This is another content3"); 



// Appending to a file in php
// $fptr = fopen("text.txt", "a");
// fwrite($fptr, "This is being appended to the file\n"); 
fclose($fptr);





?>