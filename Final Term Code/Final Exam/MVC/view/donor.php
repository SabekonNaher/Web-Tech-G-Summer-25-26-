<!DOCTYPE html>
<html>

<head>
    <title>BloodBridge</title>
</head>

<body>

<h1>BloodBridge</h1>


<!-- SUCCESS MESSAGE -->

<?php if ($success != "") { ?>

    <p style="color: green;">
        <?php echo htmlspecialchars($success); ?>
    </p>

<?php } ?>


<!-- ERROR MESSAGES -->

<?php foreach ($errors as $error) { ?>

    <p style="color: red;">
        <?php echo htmlspecialchars($error); ?>
    </p>

<?php } ?>


<h2>Donor Registration</h2>

<form action="../controller/donor.php" method="POST">

    Full Name:
    <input
        type="text"
        name="full_name"
        value="<?php echo htmlspecialchars($_POST["full_name"] ?? ""); ?>"
    >

    <br><br>

    Mobile:
    <input
        type="text"
        name="mobile"
        value="<?php echo htmlspecialchars($_POST["mobile"] ?? ""); ?>"
    >

    <br><br>

    Blood Group:

    <select name="blood_group">

        <option value="">Select</option>

        <?php
        $groups = [
            "A+", "A-",
            "B+", "B-",
            "O+", "O-",
            "AB+", "AB-"
        ];

        foreach ($groups as $g) {
        ?>

            <option value="<?php echo $g; ?>">

                <?php echo $g; ?>

            </option>

        <?php } ?>

    </select>

    <br><br>

    District:
    <input
        type="text"
        name="district"
        value="<?php echo htmlspecialchars($_POST["district"] ?? ""); ?>"
    >

    <br><br>

    Last Donation Date:
    <input
        type="date"
        name="last_donation_date"
        value="<?php echo htmlspecialchars($_POST["last_donation_date"] ?? ""); ?>"
    >

    <br><br>

    <input type="submit" value="Register">

</form>


<hr>


<h2>Search Donor</h2>

<form action="../controller/donor.php" method="GET">

    Blood Group:

    <select name="blood_group">

        <option value="">Select</option>

        <?php foreach ($groups as $g) { ?>

            <option value="<?php echo $g; ?>">
                <?php echo $g; ?>
            </option>

        <?php } ?>

    </select>

    <br><br>

    District:
    <input type="text" name="district">

    <br><br>

    <input type="submit" value="Search">

</form>


<hr>


<?php if (isset($_GET["blood_group"])) { ?>

    <h3>
        Total Donors:
        <?php echo $total; ?>
    </h3>


    <?php if (empty($donors)) { ?>

        <p>No donor found.</p>

    <?php } else { ?>

        <table border="1" cellpadding="10">

            <tr>
                <th>SL</th>
                <th>Full Name</th>
                <th>Mobile</th>
                <th>Blood Group</th>
                <th>District</th>
                <th>Days Since Last Donation</th>
                <th>Action</th>
            </tr>


            <?php
            $sl = 1;

            foreach ($donors as $donor) {

                $today = new DateTime();
                $last = new DateTime(
                    $donor["last_donation_date"]
                );

                $days = $today->diff($last)->days;
            ?>

                <tr>

                    <td>
                        <?php echo $sl++; ?>
                    </td>

                    <td>
                        <?php
                        echo htmlspecialchars(
                            $donor["full_name"]
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        echo htmlspecialchars(
                            $donor["mobile"]
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        echo htmlspecialchars(
                            $donor["blood_group"]
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        echo htmlspecialchars(
                            $donor["district"]
                        );
                        ?>
                    </td>

                    <td>
                        <?php echo $days; ?>
                    </td>

                    <td>

                        <a href="../controller/donor.php?action=unavailable&id=<?php
                        echo $donor["donor_id"];
                        ?>">
                            Mark Unavailable
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

    <?php } ?>

<?php } ?>

</body>

</html>