<?php

    $dbcon = mysqli_connect('localhost','root','akshit2405');
    if($dbcon==false)
    {
        echo "Database is not Connected!";
    }

    $dbg_mode = false;

    if (!$dbg_mode){
        $qry = "USE courierdb";
        $run = mysqli_query($dbcon, $qry);
        if (!$run){
            echo "error entering db";
        } else {
            echo "success";
        }
    } else {
    $qry = "DROP DATABASE IF EXISTS courierdb";
    $run = mysqli_query($dbcon, $qry);

    if ($run){
    $qry = "CREATE DATABASE IF NOT EXISTS courierdb";
    $run = mysqli_query($dbcon,$qry);
    if (! $run) {
        echo "Something went wrong.";
    }

    $qry = "USE courierdb";
    $run = mysqli_query($dbcon,$qry);
    if (! $run) {
        echo "Couldnt enter DB.";
    }

    $qry = "SET time_zone = '+00:00'";
    $run = mysqli_query($dbcon, $qry);
    if (!$run) { echo "Failed here."; } else { echo "success here."; }

    $qry = "CREATE TABLE IF NOT EXISTS `adlogin` (
        `email` varchar(50) DEFAULT NULL,
        `password` varchar(50) DEFAULT NULL,
        `a_id` int(11) DEFAULT NULL
    )";
    $run = mysqli_query($dbcon, $qry);
    if (!$run) { echo "Failed here."; } else { echo "success here."; }

    $qry = "CREATE TABLE IF NOT EXISTS `admin` (
        `a_id` int(11) NOT NULL,
        `email` varchar(50) NOT NULL,
        `name` varchar(50) DEFAULT NULL,
        `pnumber` bigint(14) DEFAULT NULL
    )";
    $run = mysqli_query($dbcon, $qry);
    if (!$run) { echo "Failed here."; } else { echo "success here."; }

    $qry = "CREATE TABLE IF NOT EXISTS `contacts` (
        `id` int(11) NOT NULL,
        `email` varchar(50) NOT NULL,
        `subject` varchar(30) NOT NULL,
        `msg` varchar(300) NOT NULL
    )";
    $run = mysqli_query($dbcon, $qry);
    if (!$run) { echo "Failed here."; } else { echo "success here."; }

    $qry = "CREATE TABLE IF NOT EXISTS `courier` (
        `c_id` int(11) NOT NULL,
        `u_id` int(11) DEFAULT NULL,
        `semail` varchar(50) DEFAULT NULL,
        `remail` varchar(50) DEFAULT NULL,
        `sname` varchar(50) DEFAULT NULL,
        `rname` varchar(50) DEFAULT NULL,
        `sphone` varchar(20) DEFAULT NULL,
        `rphone` varchar(20) DEFAULT NULL,
        `saddress` varchar(50) DEFAULT NULL,
        `raddress` varchar(50) DEFAULT NULL,
        `weight` int(11) DEFAULT NULL,
        `billno` int(11) NOT NULL,
        `image` text DEFAULT NULL,
        `date` date NOT NULL
    )";
    $run = mysqli_query($dbcon, $qry);
    if (!$run) { echo "Failed here."; } else { echo "success here."; }

    $qry = "CREATE TABLE IF NOT EXISTS `login` (
        `email` varchar(50) DEFAULT NULL,
        `password` varchar(50) DEFAULT NULL,
        `u_id` int(11) DEFAULT NULL
    )";
    $run = mysqli_query($dbcon, $qry);
    if (!$run) { echo "Failed here."; } else { echo "success here."; }

    $qry = "CREATE TABLE IF NOT EXISTS `users` (
        `u_id` int(11) NOT NULL,
        `email` varchar(50) NOT NULL,
        `name` varchar(50) DEFAULT NULL,
        `pnumber` bigint(14) DEFAULT NULL
    )";
    $run = mysqli_query($dbcon, $qry);
    if (!$run) { echo "Failed here."; } else { echo "success here."; }

    $qry = "ALTER TABLE `adlogin`
  ADD KEY `a_id` (`a_id`)";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`email`)";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`)";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `courier`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `billno` (`billno`),
  ADD KEY `u_id` (`u_id`)";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `login`
  ADD KEY `u_id` (`u_id`)";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`)";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `courier`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `adlogin`
  ADD CONSTRAINT `adlogin_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`)";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }

  $qry = "ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE";
  $run = mysqli_query($dbcon, $qry);
  if (!$run) { echo "Failed here."; } else { echo "success here."; }
    }
}

    // $run = mysqli_query($dbcon, $qry);
    // if (!run){
    //     echo "error executing command";
    // } else {
    //     echo "success";
    // }

    // $qry = file_get_contents('http://localhost/courier-management-system/database/courierdb.sql');
    // if ($qry){
    //     $run = mysqli_query($dbcon, $qry);
    //     if (!$run){
    //         echo "error executing courierdb.sql file data.";
    //     }
    // } else {
    //     echo "error getting contents from file";
    // }

   
?>