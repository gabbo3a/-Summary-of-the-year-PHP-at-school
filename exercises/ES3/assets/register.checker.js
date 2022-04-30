// Tutte le regex

    // name
    // surname
    // tel
    // password (confurm password)

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
