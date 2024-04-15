function getData() {
    var country = document.getElementById("countrySelect").value;
    var apiUrl = "main.php?country=" + country;

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        var dataContainer = document.getElementById("dataContainer");
        dataContainer.innerHTML = "<h2>Dados de Covid-19 em " + country + "</h2>";

        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                dataContainer.innerHTML += "<p><strong>" + data[key].ProvinciaEstado + ":</strong> Confirmados - " + data[key].Confirmados + ", Mortos - " + data[key].Mortos + "</p>";
            }
        }
        saveAccess(country);

        updateLastAccess();
    })
    .catch(error => {
        console.error('Erro ao obter os dados:', error);
    });
}

function saveAccess(country) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "main.php?saveAccess=true&country=" + country, true);
    xhr.send();
}

function updateLastAccess() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var lastAccessData = JSON.parse(xhr.responseText);
            var lastAccessElement = document.getElementById("lastAccess");
            lastAccessElement.textContent = lastAccessData.data;
        }
    };
    xhr.open("GET", "main.php?getLastAccess=true", true);
    xhr.send();
}
