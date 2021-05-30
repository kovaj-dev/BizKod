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
            if (data.status === "3"){
                console.log(data.msg);
            }
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
    params.append('userId', values.userId);
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

export const chartRequest = () =>
{
    const stats = document.querySelector('#statisticData');
    axios({
        method: 'post',
        url: '/bizkod/statistic'
    })
        .then((response) => {
            let res = response.data;
            console.log(res);
            const sumOfMonday = parseInt(res.monday[0].result) + parseInt(res.monday[1].result) + parseInt(res.monday[2].result);
            const sumOfTuesday = parseInt(res.tuesday[0].result) + parseInt(res.tuesday[1].result) + parseInt(res.tuesday[2].result);
            const sumOfWednesday = parseInt(res.wednesday[0].result) + parseInt(res.wednesday[1].result) + parseInt(res.wednesday[2].result);
            const sumOfThursday = parseInt(res.thursday[0].result) + parseInt(res.thursday[1].result) + parseInt(res.thursday[2].result);
            const sumOfFriday = parseInt(res.friday[0].result) + parseInt(res.friday[1].result) + parseInt(res.friday[2].result);
            stats.innerText = `
            ponedeljak: iz kancelarije rade ${(parseInt(res.monday[2].result)/sumOfMonday)*100}%
            utorak: iz kancelarije rade ${(parseInt(res.tuesday[2].result)/sumOfTuesday)*100}%
            sreda: iz kancelarije rade ${(parseInt(res.wednesday[2].result)/sumOfWednesday)*100}%
            četvrtak: iz kancelarije rade ${(parseInt(res.thursday[2].result)/sumOfThursday)*100}%
            petak: iz kancelarije rade ${(parseInt(res.friday[2].result)/sumOfFriday)*100}%
            `;
            const data = {
                labels: [
                    'Neodređeno',
                    'Kod kuće',
                    'Iz kancelarije'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [res.monday[0].result, res.monday[1].result, res.monday[2].result],
                    backgroundColor: [
                        '#282A2D',
                        '#00AEEF',
                        '#ED0C6E'
                    ],
                    hoverOffset: 4
                },
                    {
                    label: 'My First Dataset',
                    data: [res.tuesday[0].result, res.tuesday[1].result, res.tuesday[2].result],
                    backgroundColor: [
                        '#282A2D',
                        '#00AEEF',
                        '#ED0C6E'
                    ],
                    hoverOffset: 4
                },
                    {
                        label: 'My First Dataset',
                        data: [res.wednesday[0].result, res.wednesday[1].result, res.wednesday[2].result],
                        backgroundColor: [
                            '#282A2D',
                            '#00AEEF',
                            '#ED0C6E'
                        ],
                        hoverOffset: 4
                    },
                    {
                        label: 'My First Dataset',
                        data: [res.thursday[0].result, res.thursday[1].result, res.thursday[2].result],
                        backgroundColor: [
                            '#282A2D',
                            '#00AEEF',
                            '#ED0C6E'
                        ],
                        hoverOffset: 4
                    },
                    {
                        label: 'My First Dataset',
                        data: [res.friday[0].result, res.friday[1].result, res.friday[2].result],
                        backgroundColor: [
                            '#282A2D',
                            '#00AEEF',
                            '#ED0C6E'
                        ],
                        hoverOffset: 4
                    }]
            };
            const config = {
                type: 'pie',
                data: data
            };
            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        });
}