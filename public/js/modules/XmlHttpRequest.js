import {getChosenValuesForSchedule} from "./DomContent.js";

export const validateLoginRequest = () =>
{
    const form = document.querySelector('#loginForm');
    const formData = new FormData(form);
    const email = document.querySelector('#email');
    const password =  document.querySelector('#password');

    axios({
        method: 'post',
        data: formData,
        url: '/bizkod/login'
    })
        .then((response) => {
            let data = response.data;
            if (data.status === "2"){
                location.replace('/bizkod/home');

            } else {
                document.querySelector('#passwordMessage').innerText = data.msg;
                password.classList.remove('is-valid');
                password.classList.add('is-invalid');
                email.classList.remove('is-valid');
                email.classList.add('is-invalid');
            }
        })
}

export const submitChosenValuesForSchedule = () =>
{
    const values = getChosenValuesForSchedule();
    const params = new URLSearchParams();
    params.append('monday', values.monday);
    params.append('tuesday', values.tuesday);
    params.append('wednesday', values.wednesday);
    params.append('thursday', values.thursday);
    params.append('friday', values.friday);
    axios({
        method: 'post',
        data: params,
        url: '/bizkod/submitvalues'
    })
        .then((response) => {
            let data = response.data;
            location.reload();
        });
}

export const submitNewPasswordRequest = () =>
{
    const formData = new FormData(document.querySelector('#passwordForm'));
    const oldPass = document.querySelector('#oldpass');
    const newPass = document.querySelector('#newpass');
    const confirmPass = document.querySelector('#confirmpass');
    const message = document.querySelector('#confirmMessage');
    axios({
        method: 'post',
        data: formData,
        url: '/bizkod/newpassword'
    })
        .then((response) => {
            let data = response.data;
            if (data.status === "2") {
                location.replace('/bizkod/');
            } else if (data.status === "0"){
                message.innerText = data.msg;
                oldPass.classList.remove('is-valid');
                oldPass.classList.add('is-invalid');
                newPass.classList.remove('is-valid');
                newPass.classList.add('is-invalid');
                confirmPass.classList.remove('is-valid');
                confirmPass.classList.add('is-invalid');
            } else if (data.status === "1"){
                message.innerText = data.msg;
                message.style.color = 'green';
            }
        });
}

export const submitNewsFormRequest = () =>
{
    const formData = new FormData(document.querySelector('#newsForm'));
    axios({
        method: 'post',
        data: formData,
        url: '/bizkod/insertnews'
    })
        .then((response) => {
            let data = response.data;
            if (data.status === "0")
            {
                location.reload();
            }
        })
}