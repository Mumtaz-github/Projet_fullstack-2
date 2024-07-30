
const searchForm = document.querySelector('.ongletrecherche form');
const searchInput = document.querySelector('.ongletrecherche input[type="search"]');

if (searchForm && searchInput) {  // Check if both elements are found
  searchForm.addEventListener('submit', (e) => {   // Add an event listener to the search form
    e.preventDefault(); // Prevent the default form submission behavior

    const searchQuery = searchInput.value.trim();      // Get the search query from the input field
if (searchQuery) {    // Check if the search query is not empty
      fetch(`accueil.php?q=${searchQuery}`) // Make an AJAX request to the accueil.php script with the search query
        .then(response => response.json())  
        .then(data => {
          const resultsContainer = document.getElementById('search-results');     // Get the search results container element
          resultsContainer.innerHTML = '';
          data.forEach(result => {
            const resultHTML = `
              <div class="col">
                <div class="card h-80">
                  <a href="plats.php?id=${result.id}">
                    <img src="img/${result.image}" class="card-img-top" alt="${result.libelle}">
                  </a>
                  <div class="card-body">
                    <h5 class="card-title">${result.libelle}</h5>
                    <p class="card-text">${result.description}</p>
                    <p class="card-text">Prix: ${result.prix} €</p>
                    <a href="../PHP/Commande.php?id=${result.id}" class="btn btn-dark btn-lg rounded-pill" id="pla">Commander</a>
                  </div>
                </div>
              </div>
            `;
            resultsContainer.innerHTML += resultHTML;
          });
        })
        .catch(error => console.error('Error:', error));
    }
  });
}