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
            console.log(data);
        });
}