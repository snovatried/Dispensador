setInterval(() => {
    fetch("../api/estado_dispositivo.php")
        .then(r => r.json())
        .then(data => {
            document.getElementById("estado").innerText = data.estado;
        });
}, 10000);
