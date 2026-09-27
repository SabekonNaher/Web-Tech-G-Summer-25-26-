<?php

require_once "../model/db.php";
require_once "../model/DonorModel.php";

$errors = [];
$success = "";

$donors = [];
$total = 0;


/* --------------------
   REGISTRATION
-------------------- */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["full_name"]);
    $mobile = trim($_POST["mobile"]);
    $group = trim($_POST["blood_group"]);
    $district = trim($_POST["district"]);
    $lastDate = trim($_POST["last_donation_date"]);


    // Empty field check
    if (
        empty($name) ||
        empty($mobile) ||
        empty($group) ||
        empty($district) ||
        empty($lastDate)
    ) {
        $errors[] = "All fields are required.";
    }


    // Mobile validation
    if (!preg_match("/^01[0-9]{9}$/", $mobile)) {
        $errors[] = "Mobile must be 11 digits and start with 01.";
    }


    // Blood group validation
    $groups = [
        "A+", "A-",
        "B+", "B-",
        "O+", "O-",
        "AB+", "AB-"
    ];

    if (!in_array($group, $groups)) {
        $errors[] = "Invalid blood group.";
    }


    // Future date check
    if ($lastDate > date("Y-m-d")) {
        $errors[] = "Last donation date cannot be future.";
    }


    // 90 days check
    $today = new DateTime();
    $lastDonation = new DateTime($lastDate);

    $days = $today->diff($lastDonation)->days;

    if ($days < 90) {
        $errors[] = "You are not eligible to donate yet.";
    }


    // Save donor
    if (empty($errors)) {

        if (saveDonor(
            $conn,
            $name,
            $mobile,
            $group,
            $district,
            $lastDate
        )) {
            $success = "Donor registered successfully.";
        }
    }
}


/* --------------------
   SEARCH DONOR
-------------------- */

if (
    isset($_GET["blood_group"]) &&
    isset($_GET["district"])
) {

    $searchGroup = trim($_GET["blood_group"]);
    $searchDistrict = trim($_GET["district"]);

    if ($searchGroup != "" && $searchDistrict != "") {

        $donors = searchDonors(
            $conn,
            $searchGroup,
            $searchDistrict
        );

        $total = countDonorsByGroup(
            $conn,
            $searchGroup
        );
    }
}


/* --------------------
   MARK UNAVAILABLE
-------------------- */

if (
    isset($_GET["action"]) &&
    $_GET["action"] == "unavailable" &&
    isset($_GET["id"])
) {

    $id = $_GET["id"];

    markUnavailable($conn, $id);

    header("Location: donor.php");
    exit();
}


/* Load View */

include "../view/donor.php";

?>