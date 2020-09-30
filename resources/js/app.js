require('./bootstrap');

window.call = (phone) => {
    document.querySelector(".modal-overlay").className += " modal-is-visible";
    document.querySelector(".call-modal").className += " modal-is-visible";
    axios.get('/api/call?phone=' + phone).then((v) => {
        document.querySelector(".call-modal .modal-body").innerHTML = "OK";
    }).catch((e) => {
        document.querySelector(".call-modal .modal-body").innerHTML = e.message;
        console.log(e.message)
    });;
}

window.genericCall = () => {
    let phone = document.querySelector("#generic-call-phone").value;
    document.querySelector(".modal-overlay").className += " modal-is-visible";
    document.querySelector(".call-modal").className += " modal-is-visible";
    axios.get('/api/call?phone=' + phone).then((v) => {
        document.querySelector(".call-modal .modal-body").innerHTML = "Ok";
    }).catch((e) => {
        document.querySelector(".call-modal .modal-body").innerHTML = e.message;
        console.log(e.message)
    });
}

window.closeModal = () => {
    let className = document.querySelector(".modal-overlay")
        .className
        .replace(' modal-is-visible', '');
    document.querySelector(".modal-overlay")
        .className = className;

    className = document.querySelector(".call-modal")
        .className
        .replace(' modal-is-visible', '');
    document.querySelector(".call-modal")
        .className = className;
    document.querySelector(".call-modal .modal-body").innerHTML = '';
}
