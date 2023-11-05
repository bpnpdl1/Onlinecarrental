<?php
session_start();

function pdo()
{
    $dbhost = "localhost"; // 127.0.0.1
    $dbname = " bpnpdlme_cars";
    $dbuser = "bpnpdlme_bpnpdl";
    $dbpass = "Bipin@12345";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $dsn = "mysql:host=" . $dbhost . ";dbname=" . $dbname;

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass, $options);
    } catch (PDOException $e) {
        die("Cannot Connect to Database: " . $e->getMessage());
    }    
    return $pdo;
}

/**
 * Get Item from $_GET or $_POST with key
 *
 * @param string $key Key of Item to Fetch
 *
 * @return string|null
 */
function request($key)
{
    return $_REQUEST[$key] ?? null;
}

/**
 * Check if User is Logged in or Not
 *
 * @return bool
 */
function is_logged()
{
    if (empty($_SESSION['user_id'])) {
        return false;
    }
    return true;
}
function is_loggedd()
{
    if (empty($_SESSION['admin_id'])) {
        return false;
    }
    return true;
}

function is_owner_logged()
{
    if (empty($_SESSION['user_id'])) {
        return false;
    }
    return true;
}

/**
 * Get currently logged in user details
 *
 * @return false|array
 */
function user()
{
    if (is_logged()) {
        return find('users', $_SESSION['user_id']);
    }
    return false;
}

function owner()
{
    if (is_owner_logged()) {
        return find('users', $_SESSION['user_id']);
    }
    return false;
}

function admin()
{
    if (is_loggedd()) {
        return find('admins', $_SESSION['admin_id']);
    }
    return false;
}

/**
 * Run Arbitary SQL Code
 *
 * @param string $sql SQL Code
 * @param bool $all use fetchAll() or fetch()
 * @return array|false
 */
function query($sql, $all = true)
{
    $pdo = pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if ($all) {
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}

/**
 * Use SELECT * FROM TABLE WHERE `sth` = 'val'
 *
 * @param string $table Table Name
 * @param string $col Column Name
 * @param string $opr Operator (=, !=, >, <,...)
 * @param string $val Value to Compare
 * @param bool $all Use fetchAll() or fetch()
 *
 * @return array|false
 */
function where($table, $col, $opr, $val, $all = true)
{
    $pdo = pdo();
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE $col $opr ?");
    $stmt->execute([$val]);

    if ($all) {
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}

/**
 * Find ITEM on $table by their $id
 *
 * @param string $table Table Name
 * @param int $id ID of the Item in table
 *
 * @return array|false
 */
function find($table, $id)
{
    return where($table, 'id', '=', $id, false);
}

/**
 * Get all Items in Table
 *
 * @param string $table
 *
 * @return array|false
 */
function all($table)
{
    $pdo = pdo();

    $stmt = $pdo->prepare("SELECT * FROM $table");
    $stmt->execute();

    return $stmt->fetchAll();
}

/**
 * Count Number of Rows in Table
 *
 * @param string $table Table Name
 * @return int
 */
function count_item($table)
{
    $pdo = pdo();

    $stmt = $pdo->prepare("SELECT count(*) FROM $table");
    $stmt->execute();

    return $stmt->fetchColumn();
}

/**
 * Create Data from Associative Array
 *
 * @param string $table Table to Create Item
 * @param array $data Associative array of data to insert.
 *
 * @return true
 */
function create($table, $data)
{
    $keys = array_keys($data);
    $values = array_values($data);
    $length = count($keys);

    $sql = "INSERT INTO $table (";

    $i = 1;
    foreach ($keys as $k) {
        $sql = $sql . $k;
        if ($i != $length) {
            $sql = $sql . ", ";
        }
        $i++;
    }

    $sql = $sql . ") VALUES (";
    $i = 1;
    foreach ($keys as $k) {
        $sql = $sql . "?";
        if ($i != $length) {
            $sql = $sql . ", ";
        }
        $i++;
    }

    $sql = $sql . ")";

    $pdo = pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($values);

    return true;
}

/**
 * Update data of Item ID from Associative Array
 *
 * @param string $table Table to Update Item
 * @param int $id ID of Item to Update
 * @param array $data Associative array of data to update.
 *
 * @return true
 */
function update($table, $id, $data)
{
    $keys = array_keys($data);
    $values = array_values($data);
    $length = count($keys);

    $sql = "UPDATE $table SET ";
    $i = 1;
    foreach ($keys as $k) {
        $sql = $sql . " $k = ? ";
        if ($i != $length) {
            $sql = $sql . ", ";
        }
        $i++;
    }

    $sql = $sql . " WHERE id = ?";

    $values[] = $id;

    $pdo = pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($values);

    return true;
}

/**
 * Delete data from table
 *
 * @param string $table Table Name
 * @param int $id ID of Item to Delete
 *
 * @return true
 */
function delete($table, $id)
{
    $pdo = pdo();
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id = ?");
    $stmt->execute([$id]);

    return true;
}

function pluck($array, $key)
{
    $result = [];
    foreach ($array as $a) {
        $result[] = $a[$key];
    }
    return $result;
}


