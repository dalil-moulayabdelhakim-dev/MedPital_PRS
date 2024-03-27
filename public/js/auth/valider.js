// Get the select element
const genderSelect = document.getElementById('genderSelect');

// Add an event listener to detect changes
genderSelect.addEventListener('change', function () {
    // Check if the selected option is not the default one
    if (genderSelect.value !== "0") {
        // Add a class to change the border color
        genderSelect.classList.add('brd-valid');
    } else {
        // Remove the class if the default option is selected
        genderSelect.classList.remove('brd-valid');
    }
});

const specialtySelect = document.getElementById('specialtySelect');
if (specialtySelect != null) {
    specialtySelect.addEventListener('change', function () {
        // Check if the selected option is not the default one
        if (specialtySelect.value !== "0") {
            // Add a class to change the border color
            specialtySelect.classList.add('brd-valid');
        } else {
            // Remove the class if the default option is selected
            specialtySelect.classList.remove('brd-valid');
        }
    });
}


const roleSelect = document.getElementById('roleSelect');

if (roleSelect != null) {
    roleSelect.addEventListener('change', function () {
        // Check if the selected option is not the default one
        if (roleSelect.value !== "0") {
            // Add a class to change the border color
            roleSelect.classList.add('brd-valid');
        } else {
            // Remove the class if the default option is selected
            roleSelect.classList.remove('brd-valid');
        }
    });
}

const privacySelect = document.getElementById('privacySelect');

if (privacySelect != null) {
    privacySelect.addEventListener('change', function () {
        // Check if the selected option is not the default one
        if (privacySelect.value !== "0") {
            // Add a class to change the border color
            privacySelect.classList.add('brd-valid');
        } else {
            // Remove the class if the default option is selected
            privacySelect.classList.remove('brd-valid');
        }
    });
}

const c_pass = document.getElementById('password_confirmation');
const pass = document.getElementById('password');

function validateCPass() {
    if (c_pass.value == pass.value) {
        c_pass.style.borderColor = 'var(--secondaryr)'
    } else {
        c_pass.style.borderColor = 'red'
    }
}
c_pass.addEventListener('input', function () {
    validateCPass();
});

pass.addEventListener('input', function () {
    validateCPass();
});



