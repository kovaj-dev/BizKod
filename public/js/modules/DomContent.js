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