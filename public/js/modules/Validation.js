
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

const validatePassword = (password) =>
{
    return /^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/.test(password);
}

export const validateNewPassword = (inputs) =>
{
    let isValid = true;
    const oldMessage = document.querySelector('#oldMessage');
    const newMessage = document.querySelector('#newMessage');
    const confirmMessage = document.querySelector('#confirmMessage');
    if (inputs.old.value.trim().length < 1)
    {
        oldMessage.innerText = "Molimo vas unesite trenutnu lozinku";
        setInvalid(inputs.old.node);
        isValid = false;
    } else {
        setValid(inputs.old.node);
        oldMessage.innerText = "";
    }
    if (inputs.new.value.trim().length < 1)
    {
        newMessage.innerText = "Molimo vas unesite novu lozinku";
        setInvalid(inputs.new.node);
        isValid = false;
    } else {
        if (inputs.new.value.trim().length < 8)
        {
            newMessage.innerText = "Lozinka mora da bude dužine najmanje 8 karaktera";
            setInvalid(inputs.new.node);
            isValid = false;
        } else {
            if (!validatePassword(inputs.new.value.trim()))
            {
                setInvalid(inputs.new.node);
                newMessage.innerText = "Lozinka mora da sadrži barem jedno malo slovo, jedno veliko slovo, broj i specijalni karakter";
                isValid = false;
            } else {
                setValid(inputs.new.node);
                newMessage.innerText = "";
            }
        }
    }
    if (inputs.confirm.value.trim().length < 1)
    {
        confirmMessage.innerText = "Molimo vas unesite potvrdu lozinke";
        setInvalid(inputs.confirm.node);
        isValid = false;
    } else {
        if (inputs.confirm.value.trim() !== inputs.new.value.trim())
        {
            confirmMessage.innerText = "Lozinke se ne podudaraju";
            setInvalid(inputs.confirm.node);
            isValid = false;
        } else {
            setValid(inputs.confirm.node);
            confirmMessage.innerText = "";
        }
    }

    return isValid;
}