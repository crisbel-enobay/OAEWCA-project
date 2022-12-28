<?php

  function alert($val) {

    /**
     *
     * Admin List Alerts
     *
     */

    if ($val == "success_add_staff") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully added a staff',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "success_update") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully updated staff information',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "success_delete") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully deleted  an staff',
            'success'
          )
        </script>
      <?php
    }

    /**
     *
     * Bus List Alerts
     *
     */

    else if ($val == "success_add_bus") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully added  a bus',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "success_update_bus") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully updated bus information',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "success_delete_bus") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully deleted  a bus',
            'success'
          )
        </script>
      <?php
    }

    /**
     *
     * Route List Alerts
     *
     */

    else if ($val == "success_add_primaryroute") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully added Primary route',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "edit_success_primaryroute") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully edited routes information',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "delete_success_primaryroute") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully deleted routes',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "unarchive_success_primaryroute") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully restored routes',
            'success'
          )
        </script>
      <?php
    }

    /**
     *
     * Schedule List Alerts
     *
     */

    else if ($val == "success_add_schedule") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully added a Schedule',
            'success'
          )
        </script>
      <?php
    }
    else if ($val == "add_invalid_time") {
      ?>
        <script>
          Swal.fire(
            'Failed to add schedule!',
            'Invalid date and time',
            'error'
          )
        </script>
      <?php
    }
    else if ($val == "edit_invalid_time") {
      ?>
        <script>
          Swal.fire(
            'Failed to edit schedule!',
            'Invalid date and time',
            'error'
          )
        </script>
      <?php
    }

    else if ($val == "edit_success_schedule") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully edited schedule information',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "archive_success_schedule") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully archived a schedule',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "unarchive_success_schedule") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'Successfully unarchived a schedule',
            'success'
          )
        </script>
      <?php
    }

    /**
     *
     * Admin Login Alerts
     *
     */

    else if ($val == "failed_login") {
      ?>
        <script>
          Swal.fire(
            'Failed',
            'Incorrect Username or Password',
            'error'
          )
        </script>
      <?php
    }

    /**
     *
     * User Register Alerts
     *
     */

    else if ($val == "user_exists") {
      ?>
        <script>
          Swal.fire(
            'Failed',
            'User already exists',
            'error'
          )
        </script>
      <?php
    }

    else if ($val == "success_otp") {
      ?>
        <script>
          Swal.fire(
            'Success!',
            'OTP already sent to Email',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "failed_otp") {
      ?>
        <script>
          Swal.fire(
            'Failed',
            'Registration Failed, Incorrect OTP',
            'error'
          )
        </script>
      <?php
    }

    else if ($val == "incorrect") {
      ?>
        <script>
          Swal.fire(
            'Failed',
            'Registration Failed!Please re-enter your password!',
            'error'
          )
        </script>
      <?php
    }

    else if ($val == "success_create") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully registered an account',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "success_update") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully updated an account',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "check_email") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Email sent. Please check your Email',
            'success'
          )
        </script>
      <?php
    }

    /**
     *
     * Recover Password
     *
     */

    else if ($val == "no_email") {
      ?>
        <script>
          Swal.fire(
            'Failed',
            'Email not found!',
            'error'
          )
        </script>
      <?php
    }

    else if ($val == "email_verify") {
      ?>
        <script>
          Swal.fire(
            'Notice',
            'Email should be verified to proceed to password recovery',
            'info'
          )
        </script>
      <?php
    }

    else if ($val == "email_conflict") {
      ?>
        <script>
          Swal.fire(
            'Failed',
            'Sender Email invalid. Check Email and Password',
            'error'
          )
        </script>
      <?php
    }

    else if ($val == "success_update_user") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully updated password',
            'success'
          )
        </script>
      <?php
    }

    /**
     * 
     * Archived Admin alert
     * 
     */

    else if ($val == "success_archived_staff") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully archived a Staff',
            'success'
          )
        </script>
      <?php
    }
    
    else if ($val == "success_restore_staff") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully restored the account of Staff',
            'success'
          )
        </script>
      <?php
    }

    /**
     * 
     * Archived Bus alert
     * 
     */

    else if ($val == "success_delete_bus") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully archived a bus',
            'success'
          )
        </script>
      <?php
    }
    
    else if ($val == "success_restore_bus") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully restored a bus',
            'success'
          )
        </script>
      <?php
    }

    /**
     * 
     * Reservation List alert
     * 
     */

    else if ($val == "success_update_reservation") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully updated reservation Information',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "success_archived_reservation") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully archived a Reservation',
            'success'
          )
        </script>
      <?php
    }

    else if ($val == "success_restore_reservation") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Successfully restored a Reservation',
            'success'
          )
        </script>
      <?php
    }
    
    /**
     * 
     * Paid Ticket alert
     * 
     */
     
    else if ($val == "success_paid_ticket") {
      ?>
        <script>
          Swal.fire(
            'Success',
            'Payment Accepted',
            'success'
          )
        </script>
      <?php
    }


    /**
     *
     * Else
     *
     */

    else {
      ?>
      <script>
        Swal.fire(
          'Failed',
          'System encountered an error',
          'error'
        )
      </script>
    <?php
    }

  }

?>
