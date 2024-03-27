$(document).ready(function () {
    $('#edit_modal').on('shown.bs.modal', function () {
        $('#test_ids').select2({
            dropdownParent: $('#edit_modal'),
            width: '100%',
            placeholder: 'Please Select Test(s) Here',
        })
    })

})
function fetchRequestData(id) {
    console.log(id)
    fetch(`/api/getRequestData/${id}`)
        .then(response => response.json())
        .then(data => {
            //patient
            $('#patientName').text(data.patient.name);
            $('#patientAddress').text(data.patient.address);
            $('#patientEmail').text(data.patient.email);
            $('#patientPhone').text(data.patient.phone);
            const gender = data.patient.gender;
            if (gender == 1) {
                $('#patientGender').text('Male');
            } else if (gender == 2) {
                $('#patientGender').text('Female');
            }
            //prescription
            const status = data.status;
            $('#prescriptionStatus').text('Invalid status').removeClass()
            switch (status) {
                case '0':
                    $('#prescriptionStatus').text('Pending').addClass('badge').addClass('badge-info');
                    break;

                case '1':
                    $('#prescriptionStatus').text('Approved').addClass('badge').addClass('badge-primary');
                    break;

                case '2':
                    $('#prescriptionStatus').text('Sample Collected').addClass('badge').addClass('badge-warning');
                    break;

                case '3':
                    $('#prescriptionStatus').text('Delivered to Lab').addClass('badge').addClass('badge-secondary');
                    break;

                case '4':
                    $('#prescriptionStatus').text('Done').addClass('badge').addClass('badge-success');
                    break;

                case '5':
                    $('#prescriptionStatus').text('Cancelled').addClass('badge').addClass('badge-danger');
                    break;

                case '6':
                    $('#prescriptionStatus').text('Report Uploaded').addClass('badge').addClass('badge-dark');
                    break;

                default:
                    console.log(status)
                    $('#prescriptionStatus').text('Invalid status').removeClass().addClass('badge');
                    break;
            }

            const tbody = document.getElementById('prescriptionInfo');
            tbody.innerHTML = '';
            data.analyses.forEach(analyse => {
                const newTR = document.createElement('tr');

                // Create two cells for Name and Description
                const nameTD = document.createElement('td');
                const descriptionTD = document.createElement('td');

                // Create paragraph elements for Name and Description
                const nameP = document.createElement('p');
                const descriptionP = document.createElement('p');

                // Set classes for styling
                nameP.className = 'm-0 truncate-1';
                descriptionP.className = 'm-0 truncate-1';

                // Set text content for the paragraphs based on the data
                nameP.textContent = analyse.name || '';
                descriptionP.textContent = analyse.description || '';

                // Append paragraph elements to cells
                nameTD.appendChild(nameP);
                descriptionTD.appendChild(descriptionP);

                // Append cells to the new row
                newTR.appendChild(nameTD);
                newTR.appendChild(descriptionTD);

                // Append the new row to the tbody
                tbody.appendChild(newTR);

            });
            $('#mk-app').attr('data-patient', data.patient.name + ',' + data.patient.id).attr('data-institution', data.institution.name + ',' + data.institution.id).attr('data-prescription', id);
        })
        .catch(error => console.log('Error fetching user data:', error));
}


//get all data about appointments
function fetchAppointmentData(id) {
    fetch(`/api/getAppointmentData/${id}`)
        .then(response => response.json())
        .then(data => {

            //appointment
            $('#code').text(data.appointment.code);
            $('#schedule').text(data.appointment.schedule);
            const status = data.appointment.status;
            $('#status').text('Invalid status').removeClass()
            switch (status) {
                case '0':
                    $('#status').text('Pending').addClass('badge-info');
                    break;

                case '1':
                    $('#status').text('Approved').addClass('badge-primary');
                    break;

                case '2':
                    $('#status').text('Sample Collected').addClass('badge-warning');
                    break;

                case '3':
                    $('#status').text('Delivered to Lab').addClass('badge-secondary');
                    break;

                case '4':
                    $('#status').text('Done').addClass('badge-success');
                    break;

                case '5':
                    $('#status').text('Cancelled').addClass('badge-danger');
                    break;

                case '6':
                    $('#status').text('Report Uploaded').addClass('badge-dark');
                    break;

                default:
                    console.log(status)
                    $('#status').text('Invalid status').removeClass().addClass('badge');
                    break;
            }

            //patient
            $('#patientName').text(data.patient.name);
            $('#patientAddress').text(data.patient.address);
            $('#patientEmail').text(data.patient.email);
            $('#patientPhone').text(data.patient.phone);
            const gender = data.patient.gender;
            if (gender == 1) {
                $('#patientGender').text('Male');
            } else if (gender == 2) {
                $('#patientGender').text('Female');
            }

            //prescription
            const appStatus = data.status;
            $('#prescriptionStatus').text('Invalid status').removeClass()
            switch (appStatus) {
                case '0':
                    $('#prescriptionStatus').text('Pending').addClass('badge').addClass('badge-info');
                    break;

                case '1':
                    $('#prescriptionStatus').text('Approved').addClass('badge').addClass('badge-primary');
                    break;

                case '2':
                    $('#prescriptionStatus').text('Sample Collected').addClass('badge').addClass('badge-warning');
                    break;

                case '3':
                    $('#prescriptionStatus').text('Delivered to Lab').addClass('badge').addClass('badge-secondary');
                    break;

                case '4':
                    $('#prescriptionStatus').text('Done').addClass('badge').addClass('badge-success');
                    break;

                case '5':
                    $('#prescriptionStatus').text('Cancelled').addClass('badge').addClass('badge-danger');
                    break;

                case '6':
                    $('#prescriptionStatus').text('Report Uploaded').addClass('badge').addClass('badge-dark');
                    break;

                default:
                    console.log(status)
                    $('#prescriptionStatus').text('Invalid status').removeClass().addClass('badge');
                    break;
            }

            const tbody = document.getElementById('prescriptionInfo');
            tbody.innerHTML = '';
            data.analyses.forEach(analyse => {
                const newTR = document.createElement('tr');

                // Create two cells for Name and Description
                const nameTD = document.createElement('td');
                const descriptionTD = document.createElement('td');

                // Create paragraph elements for Name and Description
                const nameP = document.createElement('p');
                const descriptionP = document.createElement('p');

                // Set classes for styling
                nameP.className = 'm-0 truncate-1';
                descriptionP.className = 'm-0 truncate-1';

                // Set text content for the paragraphs based on the data
                nameP.textContent = analyse.name || '';
                descriptionP.textContent = analyse.description || '';

                // Append paragraph elements to cells
                nameTD.appendChild(nameP);
                descriptionTD.appendChild(descriptionP);

                // Append cells to the new row
                newTR.appendChild(nameTD);
                newTR.appendChild(descriptionTD);

                // Append the new row to the tbody
                tbody.appendChild(newTR);

            });
            $('#mk-app').attr('data-patient', data.patient.name + ',' + data.patient.id).attr('data-institution', data.institution.name + ',' + data.institution.id).attr('data-prescription', data.id);
        })
        .catch(error => console.log('Error fetching user data:', error));
}

function fetchDeleteAppointment(id) {
    const url = document.getElementById('delete-btn').getAttribute('data-url');
    $('#confirm').attr('href', `${url}/labo/appointment/delete/${id}`);
}

function fetchAppointmentDT() {
    const elmData = document.getElementById('mk-app');

    const patient = elmData.getAttribute('data-patient').split(',');
    const patientName = patient[0];
    const patientID = patient[1];

    $('#p-name').val(patientName);
    $('#p-id').val(patientID);

    const institution = elmData.getAttribute('data-institution').split(',');
    const institutionName = institution[0];
    const institutionID = institution[1];

    $('#i-name').val(institutionName);
    $('#i-id').val(institutionID);

    $('#pr-id').val(elmData.getAttribute('data-prescription'))
}


function editAppModal(id) {
    fetch(`/api/getAppointmentData/${id}`)
        .then(response => response.json())
        .then(data => {

            $('#p-name').val(data.patient.name);
            $('#i-name').val(data.institution.name);
            $('#Ecode').val(data.appointment.code);
            $('#id').val(id);
            $('#Eschedule').val(data.appointment.schedule);

            const testsSelect = document.getElementById('test_ids')
            testsSelect.innerHTML = '';
            let analysesIDs = []
            data.prescription.analyses.forEach((ana) => {
                analysesIDs.push(ana.id)
            })
            data.tests.forEach((t) => {
                let option = document.createElement("option");
                option.value = t.id;
                option.text = `${t.name}`;
                if (analysesIDs.includes(t.id)) option.selected = true;
                testsSelect.add(option)
            })

            const statusSelect = document.getElementById('Estatus')
            statusSelect.innerHTML = '';
            const statuses = [0, 1, 2, 3, 4, 5, 6]
            const tStatuses = ['Pending', 'Approved', 'Sample Collected', 'Delivered to Lab', 'Done', 'Cancelled', 'Report Uploaded',]
            statuses.forEach((s, i) => {
                let option = document.createElement("option");

                if (i == 0) {
                    option.disabled = true;
                }

                    option.text = tStatuses[i]
                    option.value = s;
                    if (data.status == s) {
                        option.selected = true
                    };
                    statusSelect.add(option);
            })
        })
        .catch(error => console.log('Error fetching user data:', error));
}
