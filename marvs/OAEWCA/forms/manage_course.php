<?php

extract($_POST);
ob_start();
include("database.php");
$sql = mysqli_query($conn, " SELECT * FROM obrs_users where username='{$username}' ");

if (mysqli_num_rows($sql) > 0) {
  header("Location: ../views/admin-add-admin.php?status=bus_exists");
  exit;
} else {
  // Check duplicate
  if (isset($_POST['check_plateNo_btn'])) {
    $sql = "SELECT * FROM obrs_bus WHERE plateNo='$plateNo'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo json_encode(array('success' => 0));
    } else {
      echo json_encode(array('success' => 1));
    }
  }

  // For Adding Bus
  if (isset($_POST['Add'])) {
    $sql = mysqli_query($conn, "SELECT * FROM obrs_sample WHERE course='$courseName'");
    if (mysqli_num_rows($sql) > 0) {
      header("Location: ../views/admin-courses.php?status=failed_add");
      exit;
    } else {
      $query = "INSERT INTO `obrs_sample`(`id`, `course`, `dept`, `availability`) 
                VALUES (NULL,'$courseName',$dept,'$availability')";
      $sql = mysqli_query($conn, $query) or die("Could Not Perform the Query");
      header("Location: ../views/manage_bus.php?status=success_add_bus");
      exit;
    }
  }

  // For Editing Bus Information
  if (isset($_POST['Update'])) {
    $sql = "UPDATE obrs_bus SET busName='$busName',maxSeats='$maxSeats',plateNo='$plateNo' WHERE id='$edit_id'";
    $result = mysqli_query($conn, $sql);
    header("Refresh:0");
    if ($result) {
      header("Location: ../views/manage_bus.php?status=success_update_bus");
      exit;
    } else {
      header("Location: ../views/manage_bus.php?status=failed_update");
      exit;
    }
  }

  // For Deleting Bus 
  if (isset($_POST['Archive'])) {
    $sql = "UPDATE obrs_bus SET deleted_bus=1 WHERE id='$bus_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header("Location: ../views/archived_bus.php?status=success_delete_bus");
      exit;
    } else {
      header("Location: ../views/manage_bus.php?status=failed_delete");
      exit;
    }
  }

  // For Unarchive Bus
  if (isset($_POST['Unarchive'])) {
    $sql = "UPDATE obrs_bus SET deleted_bus = 0 WHERE id='$del_id' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header("Location: ../views/manage_bus.php?status=success_restore_bus");
      exit;
    } else {
      header("Location: ../views/archived_bus.php?status=failed_restore");
      exit;
    }
  }

}
