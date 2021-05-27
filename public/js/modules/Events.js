import {validateLogin, validateNewPassword, validateNewsForm} from "./Validation.js";
import {getChangePasswordForm, getLoginForm, getNewsInsertForm} from "./DomContent.js";
import {
    submitChosenValuesForSchedule,
    submitNewPasswordRequest,
    submitNewsFormRequest,
    validateLoginRequest
} from "./XmlHttpRequest.js";

export const userLogin = () =>
{
    document.querySelector('#loginForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const form = getLoginForm();
        if (validateLogin(form)) {
            validateLoginRequest();
        }
    });
}

export const checkinSchedule = () =>
{
    document.querySelector('#submitSchedule').addEventListener('click', () => {
        submitChosenValuesForSchedule();
    });
}

export const toggleColors = () =>
{
    const monday = document.getElementsByName("monday");
    const thursday = document.getElementsByName("thursday");
    const wednesday = document.getElementsByName("wednesday");
    const tuesday = document.getElementsByName("tuesday");
    const friday = document.getElementsByName("friday");

    monday.forEach((radio) => {
        radio.addEventListener('click', () => {
            if (radio.value === "1"){
                document.querySelector('#monOffice').src = 'http://localhost/bizkod//public/img/icons/defaultoffice.svg';
                document.querySelector('#monHome').src = 'http://localhost/bizkod//public/img/icons/bluehome.svg';
            } else if (radio.value === "2"){
                document.querySelector('#monOffice').src = 'http://localhost/bizkod//public/img/icons/pinkoffice.svg';
                document.querySelector('#monHome').src = 'http://localhost/bizkod//public/img/icons/defaulthome.svg';
            }
        });
    });

    tuesday.forEach((radio) => {
        radio.addEventListener('click', () => {
            if (radio.value === "1"){
                document.querySelector('#tueOffice').src = 'http://localhost/bizkod//public/img/icons/defaultoffice.svg';
                document.querySelector('#tueHome').src = 'http://localhost/bizkod//public/img/icons/bluehome.svg';
            } else if (radio.value === "2"){
                document.querySelector('#tueOffice').src = 'http://localhost/bizkod//public/img/icons/pinkoffice.svg';
                document.querySelector('#tueHome').src = 'http://localhost/bizkod//public/img/icons/defaulthome.svg';
            }
        });
    });

    wednesday.forEach((radio) => {
        radio.addEventListener('click', () => {
            if (radio.value === "1"){
                document.querySelector('#wedOffice').src = 'http://localhost/bizkod//public/img/icons/defaultoffice.svg';
                document.querySelector('#wedHome').src = 'http://localhost/bizkod//public/img/icons/bluehome.svg';
            } else if (radio.value === "2"){
                document.querySelector('#wedOffice').src = 'http://localhost/bizkod//public/img/icons/pinkoffice.svg';
                document.querySelector('#wedHome').src = 'http://localhost/bizkod//public/img/icons/defaulthome.svg';
            }
        });
    });

    thursday.forEach((radio) => {
        radio.addEventListener('click', () => {
            if (radio.value === "1"){
                document.querySelector('#thuOffice').src = 'http://localhost/bizkod//public/img/icons/defaultoffice.svg';
                document.querySelector('#thuHome').src = 'http://localhost/bizkod//public/img/icons/bluehome.svg';
            } else if (radio.value === "2"){
                document.querySelector('#thuOffice').src = 'http://localhost/bizkod//public/img/icons/pinkoffice.svg';
                document.querySelector('#thuHome').src = 'http://localhost/bizkod//public/img/icons/defaulthome.svg';
            }
        });
    });

    friday.forEach((radio) => {
        radio.addEventListener('click', () => {
            if (radio.value === "1"){
                document.querySelector('#friOffice').src = 'http://localhost/bizkod//public/img/icons/defaultoffice.svg';
                document.querySelector('#friHome').src = 'http://localhost/bizkod//public/img/icons/bluehome.svg';
            } else if (radio.value === "2"){
                document.querySelector('#friOffice').src = 'http://localhost/bizkod//public/img/icons/pinkoffice.svg';
                document.querySelector('#friHome').src = 'http://localhost/bizkod//public/img/icons/defaulthome.svg';
            }
        });
    });
}

export const submitNewPassword = () =>
{
    document.querySelector('#passwordForm')
        .addEventListener('submit', (e) => {
            e.preventDefault();
            const inputs = getChangePasswordForm();
            if (validateNewPassword(inputs)){
                submitNewPasswordRequest();
            }
        });
}

export const submitNewsInsert = () =>
{
    document.querySelector('#newsForm')
        .addEventListener('submit', (e) => {
            e.preventDefault();
            const inputs = getNewsInsertForm();
            if (validateNewsForm(inputs)) {
                submitNewsFormRequest();
            }
        });
}