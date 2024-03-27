function codeGenirator(id) {
    // Get the current date and time
    const currentDate = new Date();

    // Get the current year
    const currentYear = currentDate.getFullYear();

    // Get the current month (0-indexed, so add 1 to get the actual month)
    const currentMonth = currentDate.getMonth() + 1;

    // Get the current day of the month
    const currentDay = currentDate.getDate();

    // Get the current hour (24-hour format)
    const currentHour = currentDate.getHours();

    // Get the current minute
    const currentMinute = currentDate.getMinutes();

    // Get the current second
    const currentSecond = currentDate.getSeconds();

    // Create a string in the format "YYYYMMDDHHmmss"
    const code = `${currentYear}${String(currentMonth).padStart(2, '0')}${String(currentDay).padStart(2, '0')}-${String(currentHour).padStart(2, '0')}${String(currentMinute).padStart(2, '0')}${String(currentSecond).padStart(2, '0')}`;

    // Log or use the value as needed
    $(`#${id}`).val(code)

}
