<script>
function updateProduct() {
    var productId = document.getElementById("editProductId").value;
    var newProductName = document.getElementById("NewProduc").value;
    var newProductDescription = document.getElementById("DesProduc").value;
    var newProductMarca = document.getElementById("marca").value;
    var newProductTipo = document.getElementById("tipo").value;
    var newProductLote = document.getElementById("lote").value;
    var newProductCantidad = document.getElementById("Cant").value;
    var newProductPrecio = document.getElementById("precio").value;
    var newProductProveedor = document.getElementById("prove").value;

    var productData = {
        id: productId,
        name: newProductName,
        description: newProductDescription,
        marca: newProductMarca,
        tipo: newProductTipo,
        lote: newProductLote,
        cantidad: newProductCantidad,
        precio: newProductPrecio,
        proveedor: newProductProveedor
    };

    // Realizar una solicitud AJAX utilizando fetch
    fetch('', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(productData)
    })
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta del servidor
        // Puedes mostrar un mensaje de éxito, actualizar la vista, etc.
        console.log('Producto actualizado con éxito:', data);
    })
    .catch(error => {
        // Manejar errores
        console.error('Error al actualizar el producto:', error);
    });
}
</script>