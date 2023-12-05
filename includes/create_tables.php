<?php
include("db.inc.php");

// Select the database
mysqli_select_db($conn, 'Blog');

// SQL to create table user
$sql_create_table_user = "
CREATE TABLE IF NOT EXISTS User (
    id_user INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    user_phone VARCHAR(30) NOT NULL,
    user_email VARCHAR(100) NOT NULL,
    user_picture VARCHAR(500) NOT NULL,
    password VARCHAR(100) NOT NULL
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_user)) {
    echo "Table User created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}

// SQL to create table article
$sql_create_table_article = "
CREATE TABLE IF NOT EXISTS Article (
    id_article INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(500) NOT NULL,
    category VARCHAR(50) NOT NULL,
    article_picture VARCHAR(50) NOT NULL,
    article_date VARCHAR(50) NOT NULL,
    creator_id INT(6) UNSIGNED,
    FOREIGN KEY (creator_id) REFERENCES User(id_user) ON UPDATE CASCADE ON DELETE CASCADE
)";
// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_article)) {
    echo "Table Article created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}


// SQL to create table category
$sql_create_table_category = "
CREATE TABLE IF NOT EXISTS Category (
    id_category INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    category_article_id INT(6) UNSIGNED,
    FOREIGN KEY (category_article_id) REFERENCES Article(id_article) ON UPDATE CASCADE ON DELETE CASCADE
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_category)) {
    echo "Table Category created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}



// SQL to create table Comment
$sql_create_table_comment = "
CREATE TABLE IF NOT EXISTS Comment (
    id_cmt INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    text_cmt VARCHAR(500) NOT NULL,
    date_cmt VARCHAR(50) NOT NULL,
    creator_id INT(6) UNSIGNED,
    FOREIGN KEY (creator_id) REFERENCES User(id_user) ON UPDATE CASCADE ON DELETE CASCADE,
    article_id INT(6) UNSIGNED,
    FOREIGN KEY (article_id) REFERENCES Article(id_article) ON UPDATE CASCADE ON DELETE CASCADE
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_comment)) {
    echo "Table Comment created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}

// SQL to create table Role
$sql_create_table_role = "
CREATE TABLE IF NOT EXISTS Role (
    id_role INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_title VARCHAR(50) NOT NULL,
    role_id INT(6) UNSIGNED,
    FOREIGN KEY (role_id) REFERENCES User(id_user) ON UPDATE CASCADE ON DELETE CASCADE
)";


// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_role)) {
    echo "Table Role created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}

// SQL to create table Permission
$sql_create_table_permission = "
CREATE TABLE IF NOT EXISTS Permission (
    id_permission INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    permission_type VARCHAR(50) NOT NULL,
    user_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES User(id_user) ON UPDATE CASCADE ON DELETE CASCADE
)";


// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_permission)) {
    echo "Table Permission created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}


// SQL to create table associative User Permission
$sql_create_table_user_permission = "
CREATE TABLE IF NOT EXISTS User_Permission (
    id_user INT(6) UNSIGNED,
    id_permission INT(6) UNSIGNED,
    PRIMARY KEY (id_user, id_permission),
    INDEX (id_user),
    INDEX (id_permission),
    FOREIGN KEY (id_user) REFERENCES User(id_user) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_permission) REFERENCES Permission(id_permission) ON UPDATE CASCADE ON DELETE CASCADE
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_user_permission)) {
    echo "Table User_Permission created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}

// SQL to create table PasswordRecovery
$sql_create_table_password_recovery = "
CREATE TABLE IF NOT EXISTS PasswordRecovery (
    id_pwd INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pwd_reset_email VARCHAR(100) NOT NULL,
    pwd_reset_selector VARCHAR(50) NOT NULL,
    pwd_reset_token TEXT NOT NULL,
    pwd_reset_expires TEXT NOT NULL, 
    user_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES User(id_user)  ON UPDATE CASCADE ON DELETE CASCADE
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_password_recovery)) {
    echo "Table PasswordRecovery created successfully" . " <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . " <br>";
}


