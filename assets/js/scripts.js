

// Wait to fully load the DOM
document.addEventListener("DOMContentLoaded", function() {
    // Select all form select elements inside the form
    const form = document.querySelector('.form');
    const selects = form.querySelectorAll('select');

    selects.forEach(select => {
        select.addEventListener('change', handleFilterChange);
    });

    function handleFilterChange() {
        // Get all select values from the form
        const filters = {
          country: document.getElementById('country').value,
          year: document.getElementById('year').value,
          month: document.getElementById('month').value,
          gender: document.getElementById('gender').value,
          severity: document.getElementById('severity').value,
          roadType: document.getElementById('roadType').value
        };
        console.log('Selected filters:', filters);

        // Card section
        fetch('assets/php/cards.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(filters)
        })
        .then((response) => response.json())
        .then((data) => {
            console.log("PHP Response:", data);
            const cardSection = document.querySelector(".card-section");

            // Update the stats dynamically
            cardSection.innerHTML = `
                <div class="card-element div-style">
                    <h2>${data.accidents || 0}</h2>
                    Total Accidents
                </div>

                <div class="card-element div-style">
                    <h2>${data.fatalities || 0}</h2>
                    Total Fatalities
                </div>

                <div class="card-element div-style">
                    <h2>$${data.economicLoss || 0}K</h2>
                    Economic Loss
                </div>

                <div class="card-element div-style">
                    <h2>${data.claims || 0}</h2>
                    Insurance Claims
                </div>
            `;
        })
        .catch((error) => console.error("Error:", error));

        /* // Graph section
        fetch('assets/php/graphs.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(filters)
        })
        .then((response) => response.json())
        .then((data) => {
            // Aqui va lo de ustedes
        })
        .catch((error) => console.error("Error:", error)); */

    }

});
