<?php

function saveDonor($conn, $name, $mobile, $group, $district, $lastDate)
{
    $sql = "INSERT INTO donors
            (full_name, mobile, blood_group, district, last_donation_date, is_available)
            VALUES (?, ?, ?, ?, ?, 1)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $name,
        $mobile,
        $group,
        $district,
        $lastDate
    );

    return mysqli_stmt_execute($stmt);
}


function searchDonors($conn, $group, $district)
{
    $sql = "SELECT * FROM donors
            WHERE blood_group = ?
            AND district = ?
            AND is_available = 1
            ORDER BY last_donation_date ASC";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ss",
        $group,
        $district
    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $donors = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $donors[] = $row;
    }

    return $donors;
}


function countDonorsByGroup($conn, $group)
{
    $sql = "SELECT COUNT(*) AS total
            FROM donors
            WHERE blood_group = ?
            AND is_available = 1";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $group);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($result);

    return $row["total"];
}


function markUnavailable($conn, $donorId)
{
    $sql = "UPDATE donors
            SET is_available = 0
            WHERE donor_id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $donorId);

    return mysqli_stmt_execute($stmt);
}
?>