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