function getLinhaMedia(){
    let linhaMedia = document.createElement('tr');
    linhaMedia.setAttribute('id', 'linhaMedia');

    let cabecalhoLinhaMedia = document.createElement('td');
    cabecalhoLinhaMedia.innerHTML = 'Média';

    linhaMedia.appendChild(cabecalhoLinhaMedia);

    return linhaMedia;
}

function adicionaLinhaMedia(){
    if(document.getElementById('linhaMedia') == undefined){
        let linhaMedia = getLinhaMedia();
        for(let indexNota = 1; indexNota <=9; indexNota++){
            soma = 0;

            for(let indexAluno = 1; indexAluno <= 6; indexAluno++){
                soma += parseFloat(document.getElementById('nota'+indexNota+'_aluno'+indexAluno).innerHTML);
            }

            let celulaMedia = document.createElement('td');
            celulaMedia.innerHTML = (soma/6).toFixed(2);

            linhaMedia.appendChild(celulaMedia);
        }

        document.getElementById('corpoTabela').appendChild(linhaMedia);
    }
}

function adicionaCabecalhoColunaMedia(){
    let cabecalhoColunaMedia = document.createElement('td');
    cabecalhoColunaMedia.setAttribute('rowspan', 2);
    cabecalhoColunaMedia.setAttribute('bgcolor', 'gray');
    cabecalhoColunaMedia.setAttribute('id', 'colunaMedia');
    cabecalhoColunaMedia.innerHTML = 'Média';

    document.getElementById('linha1').appendChild(cabecalhoColunaMedia);
}

function adicionaColunaMedia(){
    if(document.getElementById('colunaMedia') == undefined){
        adicionaCabecalhoColunaMedia();

        for(let indexAluno = 1; indexAluno <= 6; indexAluno++){
            let soma = 0;

            for(let indexNota = 1; indexNota <= 9; indexNota++){
                soma += parseFloat(document.getElementById('nota'+indexNota+'_aluno'+indexAluno).innerHTML);
            }

            let celulaMedia = document.createElement('td');

            celulaMedia.innerHTML = (soma/9).toFixed(2);

            document.getElementById('linha'+(indexAluno+2)).appendChild(celulaMedia);
        }
    }
    
}