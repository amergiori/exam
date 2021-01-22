$(document).ready(() => {
    const deleteRow = (id) => {

    }

    const departmentsURL = '../api/departments.php';
    let departments = [];

    $.ajax({
        url: departmentsURL,
        type: 'GET',
        success: (res) => {
            departments = JSON.parse(res);
            tableData();
        }
    })

    const tableData = () => {
        const url = '../api/leads.php'
        $.ajax({
            url: url,
            type: 'GET',
            success: (response) => {
                let res = response ? JSON.parse(response) : '';

                if (res) {

                    // names of columns
                    const leadKeys = {
                        'id': '#',
                        'fullname': 'Name',
                        'email': 'Email',
                        'phone': 'Phone',
                        'department_id': 'Department',
                        'content': 'Content',
                        'date_and_time': 'Date',
                    }

                    // loop thorugh leads
                    Object.values(res).map((lead, index) => {

                        // add tr before each lead
                        $('table tbody').append(`<tr class="lead-${lead.id}"></tr>`);

                        //  map lead's attributes
                        Object.entries(lead).map(value => {
                            (index == 0) ? ($('table thead').append(`<td>${leadKeys[value[0]]}</td>`)) : '';

                            // switch between attributes
                            switch (value[0]) {
                                case 'date_and_time':
                                    $(`table tbody tr.lead-${lead.id}`).append(`<td>${$.format.date(value[1], 'dd/MM/yy H:m')}</td>`);
                                    break;

                                case 'department_id':
                                    departments.map(val => {
                                        (val.id === lead.id) ? $(`table tbody tr.lead-${lead.id}`).append(`<td>${val.name}</td>`): '';
                                    })
                                    break;

                                default:
                                    $(`table tbody tr.lead-${lead.id}`).append(`<td>${value[1]}</td>`)
                                    break;
                            }
                        })

                        // add column for delete button
                        if (index == 0) {
                            $(`table thead`).append(`<td>Action</td>`);
                        }

                        // add delete button
                        $(`table tbody tr.lead-${lead.id}`).append(`<td><button class="btn btn-danger delete-btn" value=${lead.id}>Delete</button></td>`);
                    })
                }
                buttons();
            }
        })
    }

    // add event listener for each delete button
    const buttons = () => {
        $(`.delete-btn`).each(function() {
            $(this).click(() => {

                // confirm delete
                if (confirm('Do you wish to delete this row?')) {
                    $(`table tbody tr.lead-${this.value}`).remove();
                    const url = '../api/delete.php';
                    const data = `id=${this.value}`;
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        success: (res) => {

                            // display message
                            (status === 'failed') ?
                            $('.msg.alert-danger').toggleClass('d-none'):
                                $('.msg.alert-success').toggleClass('d-none');

                            // remove massge
                            setInterval(() => {
                                (status === 'failed') ?
                                $('.msg.alert-danger').toggleClass('d-none'):
                                    $('.msg.alert-success').toggleClass('d-none');
                            }, 5000)
                        }
                    })
                }
            });
        })
    }


})