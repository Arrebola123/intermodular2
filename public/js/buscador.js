document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const resultsContainer = document.getElementById("search-results");

    searchInput.addEventListener("input", function () {
        const query = searchInput.value.trim();

        if (query.length === 0) {
            resultsContainer.innerHTML = "";
            resultsContainer.classList.remove("show");
            return;
        }

        fetch(`../public/buscar_productos.php?q=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => {
                resultsContainer.innerHTML = data;
                if (data.trim() !== "") {
                    resultsContainer.classList.add("show");
                } else {
                    resultsContainer.classList.remove("show");
                }
            })
            .catch(error => {
                console.error("Error en la búsqueda:", error);
                resultsContainer.innerHTML = "<p>Error en la búsqueda</p>";
                resultsContainer.classList.add("show");
            });
    });

    // Opcional: ocultar los resultados al hacer clic fuera
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".search-container")) {
            resultsContainer.classList.remove("show");
        }
    });
});
