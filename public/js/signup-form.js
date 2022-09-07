
let wrapInput = document.querySelectorAll('.wrap-input');
let input = document.querySelectorAll('.input');

// if (!input.value) {
//     wrapInput.style.marginBottom = '0';
// }


$().ready(function() {
    $("#signupForm").validate({
        rules: {
            email: {
                email: true
            },
            phone_number: {
                number: true
            }
        },
        messages: {
            name: "Введіть ім'я",
            surname: "Введіть прізвище",
            email: "Введіть імейл",
            phone: "Введіть номер починаючи з  +38",
            city: "Введіть місто"
        },
    })
});


