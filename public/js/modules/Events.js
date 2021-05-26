import {validateLogin} from "./Validation.js";
import {getLoginForm} from "./DomContent.js";
import {validateLoginRequest} from "./XmlHttpRequest.js";

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