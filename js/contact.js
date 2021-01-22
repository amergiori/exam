$(document).ready(() => {

    $('#form').validate({});

    $('#name').rules("add", {
        required: true,
        minlength: 2,
        messages: {
            required: "Please enter your name",
            minlength: "Name should be at least {0} characters long"
        }
    })

    $('#email').rules("add", {
        required: true,
        email: true,
        messages: {
            required: "Please enter an email address",
            email: "Please enter a valid email address"
        }
    })

    $('#Phone').rules("add", {
        required: true,
        minlength: 10,
        maxlength: 10,
        messages: {
            required: "Please enter a phone number",
            minlength: "Please enter a phone number in the following format: 05x-xxxxxxx",
            maxlength: "Please enter a phone number in the following format: 05x-xxxxxxx"
        }
    })

    $('#exampleFormControlSelect1').rules("add", {
        required: true,
        messages: {
            required: "Please select department"
        }
    })

    $('#content').rules("add", {
        required: true,
        minlength: 2,
        messages: {
            required: "Please type your request",
            minlength: "Message should be at least {0} characters long",
        }
    })

    const url = '../api/departments.php';
    $.ajax({
        url: url,
        type: 'GET',
        success: (response) => {
            let res = response ? JSON.parse(response) : '';
            if (res) {
                $('#exampleFormControlSelect1').append(`<option value="">Choose Department</option>`)
                Object.values(res).map(dep => {
                    $('#exampleFormControlSelect1').append(`<option value="${dep.id}">${dep.name}</option>`)
                })
            }
        }
    })


    $('#form').on("submit", (event) => {
        event.preventDefault();
        const url = '../api/contact-us.php';
        const data = $('#form').serialize();

        if ($('#form').valid()) {
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: (response) => {
                    let res = response ? JSON.parse(response) : '';
                    if (res.status == 'success') {
                        $('#form').trigger("reset");
                        $('.alert-success').toggleClass('d-none');
                    } else {
                        $('.alert-danger').toggleClass('d-none');
                    }
                    setInterval(() => {
                        (status === 'failed') ?
                        $('.alert-danger').toggleClass('d-none'):
                            $('.alert-success').toggleClass('d-none');
                    }, 5000)
                }
            })
        }
    })
})