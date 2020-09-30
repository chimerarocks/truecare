require('./bootstrap');

window.call = (phone) => {
    axios.get('/api/call?phone=' + phone);
}
