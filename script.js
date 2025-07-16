function toggleStatus(id) {
    fetch('toggle.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'id=' + id
    })
    .then(response => response.text())
    .then(newStatus => {
        document.querySelector(`#row-${id} .status`).textContent = newStatus;
    });
}
