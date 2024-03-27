
function fetchUserData(id) {
    const url = $('#view-btn').data('url');
    fetch(`/api/getUserData/${id}`)
        .then(response => response.json())
        .then(data => {
            $('#name').text(data.name);
            $('#id_card_number').text(data.id_card_number);
            $('#email').text(data.email);
            $('#address').val(data.address);
            $('#phone').text(data.phone);
            $('#specialty').text(data.specialty);
            $('#date_of_birth').text(data.date_of_birth);
            const gender = data.gender;
            if (gender == 1) {
                $('#gender').text('Male');
            } else if (gender == 2) {
                $('#gender').text('Female');
            }

            $('#file').attr('src', data.file);
            $('#reject_btn').attr('href', `${url}/admin/user/reject/${id}`);
            $('#accept_btn').attr('href', `${url}/admin/user/accept/${id}`);
        })
        .catch(error => console.log('Error fetching user data:', error));
}

function fetchDelete(user) {
    const id = user.id;
    console.log(id)
    $('#id').attr('value', id);
}

function fetchMultiDelete() {
    var selectedAdminIds = [];
    var checkboxes = document.querySelectorAll('.admin-checkbox:checked');

    checkboxes.forEach(function (checkbox) {
        selectedAdminIds.push(checkbox.value);
    });

    // Set the array of adminIds to the hidden input in the form
    document.getElementById('multiDeleteAdminIds').value = selectedAdminIds;

}
