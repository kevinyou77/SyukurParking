

function loginValidation () {
    const username = document.querySelector("#username").value;
    const password = document.querySelector("#password").value;

    let emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (email === "" || !email.match(emailRegex)) {
        alert("Invalid Email!");
        return false;
    }

    if (password === "") {
        alert("Invalid password");
        return false;
    }

    return true;
}

function warningMessage (msg) {
    let flashMsg = document.querySelector("#flash-msg");
    flashMsg.innerHTML += '<li>' + msg + '' +'</li>';
}

function registerValidation () {
    const username = document.querySelector("#username").value, 
          password = document.querySelector("#password").value,
          email    = document.querySelector("#email").value,
          fullName = document.querySelector("#fullname").value,
          address  = document.querySelector("#address").value,
          genderF  = document.querySelector('#genderf').checked,
          genderM  = document.querySelector('#genderm').checked,
          dob      = document.querySelector("#dob").value.split('-');

    let emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
        usernameRegex = /\d/,
        addressRegex = /jalan/i;
    
    let flashMsg = document.querySelector("#flash-msg");
    //flashMsg.innerHTML = '<ul>';

    let passed = true;

    let today  = new Date();
    let userDob = new Date(dob);

    let warningMessageArr = [];
    flashMsg.innerHTML = '';

    if (username.length < 5 || !username.match(usernameRegex)) {
        warningMessageArr.push("Username is empty");
        passed = false;
    }

    if (password === '') {
       warningMessageArr.push("Password is empty");
        passed = false;
    }

    if (fullName === '') {
        warningMessageArr.push("Fullname is empty");
        passed = false;
    }

    if (address === '' || !address.match(addressRegex)) {
        warningMessageArr.push("Address is empty / Invalid address");
        passed = false;
    }

    if (!email.match(emailRegex)) {
        warningMessageArr.push("Invalid email");
        passed = false;
    }

    if (isNaN(userDob.getDay()) || isNaN(userDob.getYear()) || isNaN(userDob.getMonth())){
        warningMessageArr.push("Input date is empty");
        passed = false;
    }
    
    if (userDob.getFullYear() > today.getFullYear()) {
        warningMessageArr.push("Date cannot be greater than today");
        passed = false;
    }

    if ((userDob.getFullYear() === today.getFullYear()) && (userDob.getMonth() > today.getMonth() || userDob.getDay() > today.getDay())) {
        warningMessageArr.push("Date cannot be greater than today");
        passed = false;
    }

    if (!genderF || !genderM) {
        warningMessageArr.push("Select a gender");
        passed = false;
    }

    warningMessageArr.forEach((msg) => {
        warningMessage(msg);
    });

    //flashMsg.innerHTML += '</ul>';
    flashMsg.style.display = 'block';

    if (flashMsg) {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    return passed;
}

// x.addEventListener ("input", (event) => {
//     if (username.value === "") {
//         alert("Invalid username");
//     }
// })