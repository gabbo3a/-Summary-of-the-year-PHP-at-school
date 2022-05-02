// Tutte le regex

    // name
    // surname
    // tel
    // password (confurm password)


// show passwords
const showPassword = (id1, id2) => {
    const input1 = document.querySelector(`#${id1}`);
    const input2 = document.querySelector(`#${id2}`);

    if (input1.type === "password") {
        input1.type = "text"
        input2.type = "text"
    } else {
        input1.type = "password"
        input2.type = "password"
    }
}

// pass on submit
const checkPassword = (id1, id2, msg, button) => {
    const input1 = document.querySelector(`#${id1}`);
    const input2 = document.querySelector(`#${id2}`);
    const btn = document.querySelector(`#${button}`);
    const dmsg = document.querySelector(`#${msg}`);

    console.log(typeof input1.value);
    if (input1.value === input2.value && input1.value !== '') {
        btn.disabled = false
        dmsg.innerHTML = '';
    } else {
        btn.disabled = true
        dmsg.innerHTML = 'Password is not same';
    } 

    
}

// free email request  => codice brutto brutto
const freeEmail = (serverURI, text, popup, button) => {
    const msg = document.getElementById(popup);
    const btn = document.getElementById(button);

    // check length
    if (text.length === 0) {
        msg.innerHTML = "";
        return;
    }

    // HTTP request (GET)
    const URI = `${serverURI}/freeEmail.php?email=${text}`
    fetch(URI)
        .then((result) => result.json())
        .then((result) => {
            if (result.status !== 200) msg.innerHTML = "error";

            // Print msg
            if (result.result) {
                msg.innerHTML = `<i class="bi bi-check-circle-fill text-success"></i> Free email`
                btn.disabled = false
            } else {
                msg.innerHTML = `<i class="bi bi-x-circle text-danger"></i> Free is not email` // popip err
                btn.disabled = true
            }
        })
}



