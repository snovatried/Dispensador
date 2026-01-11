function validarCantidad() {
    const cantidad = document.getElementById("cantidad").value;

    if (cantidad <= 0) {
        alert("La cantidad debe ser mayor a cero");
        return false;
    }
    return true;
}
