function entrar(){
    let usuario = document.getElementById('usuario').value;
    let senha = document.getElementById('senha').value;

    if(usuario == 'user' && senha == 'pass'){
        alert('Login OK');
    }
    else{
        document.getElementById('usuario').setAttribute('class', 'user_pass_fail');
        document.getElementById('senha').setAttribute('class', 'user_pass_fail');
    }
}