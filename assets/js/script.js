// script.js
const asientoLabels = document.querySelectorAll('.asiento-label');
const reservationButton = document.getElementById('reservation-button');
const selectedSeats = [];

asientoLabels.forEach((label) => {
    label.addEventListener('click', () => {
        label.classList.toggle('selected');
        if (selectedSeats.includes(label)) {
            selectedSeats.splice(selectedSeats.indexOf(label), 1);
        } else {
            selectedSeats.push(label);
        }

        if (selectedSeats.length > 0) {
            reservationButton.disabled = false;
        } else {
            reservationButton.disabled = true;
        }
    });
});
