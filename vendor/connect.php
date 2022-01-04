<?php
//mysql_connect (Нельзя прописывать явно host:'', password:''  и .т.д.)

$connect = mysqli_connect('localhost','mysql','mysql','sleeping'); //(host:'', user:'', password:'', database:'')

if(!$connect) {
    die('Error connect to DataBase');
}
