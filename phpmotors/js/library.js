// Show/Hide Password
const pswdBtn = document.getElementById('pswdBtn');
pswdBtn.addEventListener('click', function(){
    let pswdInput = document.getElementById('clientPassword');
    let type = pswdInput.getAttribute('type');
    if(type == 'password'){
        pswdInput.setAttribute('type', 'text');
        pswdBtn.setAttribute('value', 'Hide Password');
    } else{
        pswdInput.setAttribute('type', 'password');
        pswdBtn.setAttribute('value', 'Show Password');
    }
});