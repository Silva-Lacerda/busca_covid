<?php
function getCovidData($country) {
    $apiUrl = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=" . $country;
    $jsonData = file_get_contents($apiUrl);
    return json_decode($jsonData, true);
}

function saveAccess($country) {
    $servername = "localhost";
    $username = "seu_usuario_mysql";
    $password = "sua_senha_mysql";
    $dbname = "Covid19";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO ultimas_consultas (pais, data) VALUES (?, NOW())");
    $stmt->bind_param("s", $country);

    $stmt->execute();

    $stmt->close();
    $conn->close();
}

function getLastAccess() {
    $servername = "localhost";
    $username = "seu_usuario_mysql";
    $password = "sua_senha_mysql";
    $dbname = "Covid19";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT pais, data FROM ultimas_consultas ORDER BY data DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastAccess = array(
            "pais" => $row["pais"],
            "data" => $row["data"]
        );
    } else {
        // Caso não haja registros no banco de dados ainda
        $lastAccess = array(
            "pais" => "",
            "data" => ""
        );
    }

    $conn->close();

    return $lastAccess;
}
?>
