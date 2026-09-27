USE bloodbridge_db;

CREATE TABLE donors (
    donor_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(60),
    mobile VARCHAR(11),
    blood_group VARCHAR(3),
    district VARCHAR(40),
    last_donation_date DATE,
    is_available TINYINT(1) DEFAULT 1
);