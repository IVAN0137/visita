document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('add-guide-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch('add_guide.php', {
            method: 'POST',
            body: formData
        }).then(response => response.text())
          .then(data => alert(data))
          .catch(error => console.error('Error:', error));
    });

    const searchInput = document.getElementById('search-input');
    searchInput.addEventListener('input', function() {
        fetch(`search_guides.php?query=${searchInput.value}`)
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('cards-container');
                container.innerHTML = '';
                data.forEach(guide => {
                    const card = document.createElement('div');
                    card.className = 'card';
                    card.innerHTML = `
                        <img src="${guide.foto}" alt="${guide.nombre}">
                        <h3>${guide.nombre}</h3>
                        <p>${guide.colonia}, ${guide.municipio}</p>
                    `;
                    container.appendChild(card);
                });
            });
    });

    // Cargar guías al cargar la página
    fetch('get_guides.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('cards-container');
            data.forEach(guide => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <img src="${guide.foto}" alt="${guide.nombre}">
                    <h3>${guide.nombre}</h3>
                    <p>${guide.colonia}, ${guide.municipio}</p>
                `;
                container.appendChild(card);
            });
        });
});
