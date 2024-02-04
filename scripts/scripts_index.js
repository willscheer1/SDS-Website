
/* Phone number input formatting */
IMask(document.getElementById('phone'), {
    mask: "(000) 000-0000"
});

/* Input date restriction:  >= current date */
document.addEventListener('DOMContentLoaded', function() {
    // Get the current date in the format "YYYY-MM-DD"
    const currentDate = new Date().toISOString().split('T')[0];

    // Set the min attribute of the date input to the current date
    document.getElementById('date').setAttribute('min', currentDate);
});

/* Character counters */
function countChars(input, max, counter_id) {
    let numChars = input.value.length;
    
    if (numChars >= max) {
        input.value = input.value.slice(0, max);
        numChars = input.value.length;
    }

    if (counter_id) {
        document.getElementById(counter_id).innerHTML = numChars;
    }
}
