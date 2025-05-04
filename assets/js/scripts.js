

// Wait to fully load the DOM
document.addEventListener("DOMContentLoaded", function() {
    // Select all form select elements inside the form
    const form = document.querySelector('.form');
    const selects = form.querySelectorAll('select');

    selects.forEach(select => {
        select.addEventListener('change', handleFilterChange);
    });

    function handleFilterChange() {
        // Get all selected values from the form
        const filters = {
          country: document.getElementById('country').value,
          year: document.getElementById('year').value,
          month: document.getElementById('month').value,
          gender: document.getElementById('gender').value,
          severity: document.getElementById('severity').value,
          roadType: document.getElementById('roadType').value
        };
        console.log('Selected filters:', filters);
    }

});
