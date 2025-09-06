function setaResultado(resultado){
    let campoResultado = document.getElementById('resultado');
    let containerResultado = document.getElementById('containerResultado');

    campoResultado.innerHTML = resultado;

    if(resultado > 0){
        containerResultado.setAttribute('class', 'container container-resultado-positivo');
    }
    else if (resultado < 0){
        containerResultado.setAttribute('class', 'container container-resultado-negativo');
    }
    else{
        containerResultado.setAttribute('class', 'container container-resultado-zero');
    }
}

function calcula(){
    let numeroX = document.getElementById('numeroX').value;
    let numeroY = document.getElementById('numeroY').value;
    let operador = document.getElementById('operador').value;
    let resultado;

    switch (operador){
        case 'soma' :
            resultado = parseFloat(numeroX) + parseFloat(numeroY);
            break;
        case 'subtracao' :
            resultado = parseFloat(numeroX) - parseFloat(numeroY);
            break;
        case 'multiplicacao' :
            resultado = parseFloat(numeroX) * parseFloat(numeroY);
            break;
        case 'divisao' :
            resultado = parseFloat(numeroX) / parseFloat(numeroY);
            break;
        case 'potenciacao' :
            resultado = parseFloat(numeroX) ** parseFloat(numeroY);
            break;
        case 'fatorial' :
            if(numeroX == 0){
                resultado = 0;
                break
            }

            resultado = 1;
            for(let i = 1; i <= parseInt(numeroX); i++){
                resultado *= i;
            }
            break;
    }

    setaResultado(resultado); 
}

function onSelectOperador(){
    let operador = document.getElementById('operador').value;
    let campoY = document.getElementById('numeroY');

    if(operador == 'fatorial'){
        campoY.value = 0;
        campoY.setAttribute('disabled', 'true');
    }
    else{
        campoY.removeAttribute('disabled');
    }
}