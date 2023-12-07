
window.onload = function () {
    let name = document.getElementById("username");
    let password = document.getElementById('password');
    let form = document.getElementById('form');
    form.addEventListener("input", usernameChecker );
    function usernameChecker(e) {
        if( name.validity.tooShort ) {
            name.setCustomValidity("Name needs to be 3-15 characters long.");
            name.reportValidity();
        } else {
            name.setCustomValidity("");
        }
        if( password.validity.tooShort ) {
            password.setCustomValidity("Password needs to be 5-15 characters long.");
            password.reportValidity();
        }else {
            password.setCustomValidity("");
        }
    }

}