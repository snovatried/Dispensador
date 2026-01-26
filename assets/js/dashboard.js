setInterval(() => {
    fetch("../api/estado_dispositivo.php")
        .then(r => {
            if (!r.ok) throw new Error("Network response was not ok");
            return r.json();
        })
        .then(data => {
            const el = document.getElementById("estado");
            if (el && data && data.estado) {
                el.innerText = data.estado;
            }
        })
        .catch(err => {
            console.error("Error fetching estado_dispositivo:", err);
            // Optionally show offline state in UI:
            const el = document.getElementById("estado");
            if (el) el.innerText = "offline";
        });
}, 10000);
