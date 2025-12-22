const params = new URLSearchParams(window.location.search);
const title = document.querySelector('title');

var action = params.get('action');
if(action == 'signUp'){
    register.classList.add('active');
    login.classList.remove('active');
    title.innerText = 'Cadastrar';
}else{
    login.classList.add('active');
    register.classList.remove('active');
    title.innerText = 'Entrar';
}