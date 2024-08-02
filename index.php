
<?php 
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
//verificando a conexão
if ($conn ->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully" . PHP_EOL;

$sql = "CREATE DATABASE IF NOT EXISTS myDatabase";
if ($conn ->query($sql) ===TRUE) {
    echo "Database created successfully" . PHP_EOL;
} else {
    echo "Error creating database: ". $conn->error . PHP_EOL;
}
//fechando a conexão
$conn->close();
//criando a conexão para criar tabela
$mysqli = new mysqli ($servername, $username, $password, "myDatabase");

//verificando a conexão
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
//criando a tabela users
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if  ($mysqli->query($sql) === TRUE) {
    echo "Table Users created successfully" . PHP_EOL;
} else {
    echo "Error creating table: ". $mysqli->error . PHP_EOL;
}

//inserindo um registro na tabela users
$sql = "INSERT INTO Users (username, email) VALUES ('JohnDoe', 'john@example.com')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully" .PHP_EOL;
} else {
    echo "Error: ". $sql . "<br>" . $mysqli->error . PHP_EOL;
}
//selecionando registros da tabela users
$sql = "SELECT id, username, email FROM Users";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: ". $row["id"]. "-Name: ". $row["username"]. "-Email: ". $row["email"]. PHP_EOL;
    }
} else {
    echo ") results" .PHP_EOL;
}
// Selecionando resgistros na tabela users
$sql = "UPDATE Users SET email='john_updated@example.com' WHERE username='JohnDoe'";

if ($mysqli->query($sql) === TRUE) {
    echo "Record upodate successfully" . PHP_EOL;
} else {
    echo "Error updating record: " . $mysqli->error . PHP_EOL;
}
//deletando um registro de tabela users
$sql = "DELETE FROM Users WHERE username='JohnDoe'";

if ($mysqli->query($sql) === TRUE) {
    echo "Record deleted successfully" . PHP_EOL;
} else {
    echo "Error deleting record: " .mysqli->error . PHP_EOL;

    //fechando a conexão
    $mysqli->close();
}

?>
