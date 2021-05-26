
const setValid = (input) =>
{
    if (input.classList.contains('is-invalid'))
    {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }
    input.classList.add('is-valid');
}
const setInvalid = (input) =>
{
    if (input.classList.contains('is-valid'))
    {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }
    input.classList.add('is-invalid');
}

const validateEmail = (mail) =>
{
    return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail);

}

export const validateLogin = (inputs) =>
{
    let isValid = true;
    const emailMessage = document.querySelector('#emailMessage');
    const passMessage = document.querySelector('#passwordMessage');
    if (inputs.email.value.trim().length < 1)
    {
        emailMessage.innerText = "Molimo vas unesite vaš email";
        setInvalid(inputs.email.node);
        isValid = false;
    } else if (!validateEmail(inputs.email.value.trim()))
    {
        emailMessage.innerText = "Pogrešan format email-a";
        setInvalid(inputs.email.node);
        isValid = false;
    } else {
        setValid(inputs.email.node);
        emailMessage.innerText = "";
    }
    if (inputs.password.value.trim().length < 1)
    {
        passMessage.innerText = "Molimo vas unesite vašu lozinku";
        setInvalid(inputs.password.node);
        isValid = false;
    } else {
        setValid(inputs.password.node);
        passMessage.innerText = "";
    }

    return isValid;
}