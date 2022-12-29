<?php
// get all paid transactions
function getPaidTransactions() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_reservations.id, Username, from_subroute, to_subroute, dateDeparture, price, totalPrice, user_id, reservedSeats, bus_id, busName, datePaid, basePrice
    FROM obrs_reservations
    INNER JOIN obrs_users ON obrs_reservations.user_id = obrs_users.ID
    INNER JOIN obrs_schedule ON obrs_reservations.schedule_id = obrs_schedule.id
    INNER JOIN obrs_bus ON obrs_schedule.bus_id = obrs_bus.id
    WHERE is_paid = 1
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
// get all paid transactions
function getCourses() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_sample.id, course, dept, availability
    FROM obrs_sample
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
// get all unpaid transactions
function getUnpaidTransactions() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_reservations.id, Username, from_subroute, to_subroute, dateDeparture, price, totalPrice, user_id, reservedSeats, bus_id, busName, dateReserved, basePrice
    FROM obrs_reservations
    INNER JOIN obrs_users ON obrs_reservations.user_id = obrs_users.ID
    INNER JOIN obrs_schedule ON obrs_reservations.schedule_id = obrs_schedule.id
    INNER JOIN obrs_bus ON obrs_schedule.bus_id = obrs_bus.id
    WHERE is_paid = 0 AND obrs_reservations.is_deleted=0
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
// get all archived unpaid transactions
function getArchivedUnpaidTransactions() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_reservations.id, Username, from_subroute, to_subroute, dateDeparture, price, totalPrice, user_id, reservedSeats, bus_id, busName, dateReserved, basePrice
    FROM obrs_reservations
    INNER JOIN obrs_users ON obrs_reservations.user_id = obrs_users.ID
    INNER JOIN obrs_schedule ON obrs_reservations.schedule_id = obrs_schedule.id
    INNER JOIN obrs_bus ON obrs_schedule.bus_id = obrs_bus.id
    WHERE is_paid=0 AND obrs_reservations.is_deleted=1");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
// get all buses
function getBuses() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, busName, maxSeats, plateNo
    FROM obrs_bus
    WHERE deleted_bus = 0
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
function getArchivedBuses() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, busName, maxSeats, plateNo
    FROM obrs_bus
    WHERE deleted_bus = 1
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
// get all schedules
function getSchedules() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_schedule.id, dateDeparture, from_primary, to_primary, bus_id, currentSeats, price, maxSeats, busName , available_seats, occupied_seats, base_price, per_km
    FROM obrs_schedule
        INNER JOIN obrs_bus ON obrs_bus.id = obrs_schedule.bus_id
        INNER JOIN obrs_parent_route ON obrs_parent_route.id = obrs_schedule.routeid
    WHERE obrs_schedule.deleted = 0
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
function getArchivedSchedules() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_schedule.id, dateDeparture, from_primary, to_primary, bus_id, currentSeats, price, maxSeats, busName, available_seats, occupied_seats, base_price, per_km
    FROM obrs_schedule
        INNER JOIN obrs_bus ON obrs_bus.id = obrs_schedule.bus_id
        INNER JOIN obrs_parent_route ON obrs_parent_route.id = obrs_schedule.routeid
    WHERE obrs_schedule.deleted = 1
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
// get all routes
function getRoutes() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, from_primary, to_primary, total_distance
    FROM obrs_parent_route
    WHERE `deleted`= 0
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
function getArchivedRoutes() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, from_primary, to_primary, total_distance
    FROM obrs_parent_route
    WHERE `deleted`= 1
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
// get all admins
function getStaff() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT ID, Firstname, Lastname, Email, Username , Password
    FROM obrs_users
    WHERE Class = 1 AND is_deleted = 0 AND NOT Username= 'admin';
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

// get archived admins
function getArchivedAdmin() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT ID, Firstname, Lastname, Email, Username
    FROM obrs_users
    WHERE Class = 1 AND is_deleted = 1 AND NOT Username= 'admin';
    ");
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

// check if ticket entered in scan is valid
function checkTicket($ticket) {
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM obrs_reservations where id='$ticket' AND is_paid = 0");
    if(mysqli_num_rows($sql)>0) {
        return 1;
    } return 0;
}

function getTicket($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_reservations.id, Username, from_subroute, to_subroute, reserved_seats, dateDeparture, price, totalPrice, schedule_id, dateReserved, FirstName, LastName, is_paid, reservedSeats, basePrice
    FROM obrs_reservations
    INNER JOIN obrs_users ON obrs_reservations.user_id = obrs_users.ID
    INNER JOIN obrs_schedule ON obrs_reservations.schedule_id = obrs_schedule.id
    INNER JOIN obrs_bus ON obrs_schedule.bus_id = obrs_bus.id
    WHERE obrs_reservations.id = '{$id}' AND is_paid = 0;
    ");
    return mysqli_fetch_array($sql, MYSQLI_ASSOC);
}
function getPassengers($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, name, age
    FROM obrs_passengers
    WHERE reservation_id = '{$id}';
    ");

    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}
function getBus($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, busName, maxSeats, plateNo
    FROM obrs_bus WHERE id = {$id}
    ");
    return mysqli_fetch_array($sql, MYSQLI_ASSOC);
}
function routeExists($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT 1 FROM obrs_parent_route WHERE id = '$id'
    ");
    return mysqli_num_rows($sql) > 0;
}

function scheduleExists($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT 1 FROM obrs_schedule WHERE id = '$id'
    ");
    return mysqli_num_rows($sql) > 0;
}
function getSchedule($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT obrs_schedule.id, dateDeparture, from_primary, to_primary, bus_id, currentSeats, price, maxSeats, busName, available_seats, occupied_seats, base_price, per_km, routeid, total_distance
    FROM obrs_schedule
        INNER JOIN obrs_bus ON obrs_bus.id = obrs_schedule.bus_id
        INNER JOIN obrs_parent_route ON obrs_parent_route.id = obrs_schedule.routeid
    WHERE obrs_schedule.deleted = 0 AND obrs_schedule.id = $id
    ");
    return mysqli_fetch_array($sql, MYSQLI_ASSOC);
}

function getRoute($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, from_primary, to_primary, total_distance
    FROM obrs_parent_route
    WHERE id = '$id'
    ");
    return mysqli_fetch_array($sql, MYSQLI_ASSOC);
}
function getSubroutes($id) {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT id, destination, distance FROM obrs_sub_routes WHERE parentid = '$id'"
    );
    return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

function deletePastSchedules() {
    include 'database.php';
    $today = date("Y-m-d G:i:s",strtotime('+1 day'));
    $query = mysqli_query($conn, "UPDATE obrs_schedule SET deleted = 1 WHERE dateDeparture < '$today' ");
    $sql=mysqli_query($conn,$query);
}

function deletePastReservations() {
    include 'database.php';
    $today = date("Y-m-d G:i:s",strtotime('+1 day'));
    //$query = mysqli_query($conn, "UPDATE obrs_reservations SET is_deleted = 1 WHERE dateReserved < '$today' AND is_paid = 0 ");
    echo $today;
    //$sql=mysqli_query($conn,$query);
}

function countUsers() {
    include 'database.php';
    $sql = mysqli_query($conn,
    "SELECT COUNT(ID) as Total
    FROM obrs_users 
    WHERE Class = 0 AND Status = 1 AND is_deleted = 0 ;
    ");
    return mysqli_fetch_array($sql, MYSQLI_ASSOC);
}

?>
    <!-- WHERE is_paid = 1 -->
