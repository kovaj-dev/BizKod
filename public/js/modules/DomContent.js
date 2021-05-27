export const getLoginForm = () =>
{
    const form = document.querySelector('#loginForm');
    const email = form.querySelector('#email');
    const password = form.querySelector('#password');

    return {
        email: {node: email, value:email.value},
        password: {node: password, value:password.value}
    }
}

export const getChosenValuesForSchedule = () =>
{
    const monday = document.getElementsByName("monday");
    const thursday = document.getElementsByName("thursday");
    const wednesday = document.getElementsByName("wednesday");
    const tuesday = document.getElementsByName("tuesday");
    const friday = document.getElementsByName("friday");

    let mondayValue = 0;
    monday.forEach((radio) => {
        if (radio.checked){
            mondayValue = radio.value;
        }
    });

    let thursdayValue = 0;
    thursday.forEach((radio) => {
        if (radio.checked){
            thursdayValue = radio.value;
        }
    });

    let wednesdayValue = 0;
    wednesday.forEach((radio) => {
        if (radio.checked){
            wednesdayValue = radio.value;
        }
    });

    let tuesdayValue = 0;
    tuesday.forEach((radio) => {
        if (radio.checked){
            tuesdayValue = radio.value;
        }
    });

    let fridayValue = 0;
    friday.forEach((radio) => {
        if (radio.checked){
            fridayValue = radio.value;
        }
    });

    return {
        monday: mondayValue,
        tuesday: tuesdayValue,
        wednesday: wednesdayValue,
        thursday: thursdayValue,
        friday: fridayValue
    }
}

export const getChangePasswordForm = () => {
    const form = document.querySelector('#passwordForm');
    const oldPassword = form.querySelector('#oldpass');
    const newPassword = form.querySelector('#newpass');
    const confirmPassword = form.querySelector('#confirmpass');

    return {
        old: { node: oldPassword, value: oldPassword.value },
        new: { node: newPassword, value: newPassword.value },
        confirm: { node: confirmPassword, value: confirmPassword.value }
    }
}

export const getNewsInsertForm = () => {
    const form = document.getElementById('newsForm');
    const title = document.getElementById('title');
    const desc = document.getElementById('description');
    const radios = document.getElementsByName('newsfor');
    let radioValue = "";
    radios.forEach((radio) => {
        if (radio.checked) {
            radioValue = radio.value;
        }
    });
    return {
        title: { node: title, value: title.value },
        desc: { node: desc, value: desc.value },
        radioValue
    }
}