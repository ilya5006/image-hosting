let timesOfDaySpan = document.querySelector('#times_of_day');

let hours = new Date().getHours();

if (hours >= 5 && hours <= 11) {
    timesOfDaySpan.textContent = 'Доброе утро';
} else if (hours >= 12 && hours <= 15) {
    timesOfDaySpan.textContent = 'Добрый день';
} else if (hours >= 16 && hours <= 24) {
    timesOfDaySpan.textContent = 'Добрый вечер';
} else if (hours >= 0 && hours <= 4) {
    timesOfDaySpan.textContent = 'Доброй ночи';
}