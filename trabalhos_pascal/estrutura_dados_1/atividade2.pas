program atividade2;

type 
    VetorPilha = array[0..4] of integer;

function isPilhaCheia(posicao, tamanho : integer): boolean;
begin
    isPilhaCheia := (posicao > tamanho);
end;

function isPilhaVazia(posicao : integer): boolean;
begin
    isPilhaVazia := (posicao = 0);
end;

procedure incluir(var posicao : integer; var conteudo : VetorPilha; tamanho, valor : integer);
begin
    if isPilhaCheia(posicao, tamanho) then
        writeln('A pilha esta cheia')
    else
    begin
        conteudo[posicao] := valor;
        posicao := posicao + 1;
    end;
end;

procedure remover(var posicao : integer);
begin
    if isPilhaVazia(posicao) then
        writeln('A pilha esta vazia')
    else
        { Na Pilha (LIFO), removemos sempre o último que entrou. 
          Não precisamos de 'for' para deslocar nada, basta diminuir a posição! }
        posicao := posicao - 1;
end;

function consultar(posicao : integer; conteudo : VetorPilha): integer;
begin
    if isPilhaVazia(posicao) then
    begin
        writeln('Pilha vazia');
        consultar := -1; 
    end
    else
        { Na pilha, consultamos o topo, que é o último elemento inserido.
          Como 'posicao' sempre aponta para o próximo espaço vazio, 
          o último ocupado é 'posicao - 1'. }
        consultar := conteudo[posicao - 1];
end;

procedure escrever(posicao : integer; conteudo : VetorPilha);
var 
    i : integer;
begin
    writeln('--- Conteudo da Pilha ---');
    { Para imprimir a pilha do topo até a base, usamos 'downto' }
    for i := posicao - 1 downto 0 do
        writeln(conteudo[i]);
    writeln('-------------------------');
end;

var 
    posicao : integer;
    conteudo : VetorPilha;
    tamanho : integer;

begin
    posicao := 0;
    tamanho := 4;

    incluir(posicao, conteudo, tamanho, 1);
    incluir(posicao, conteudo, tamanho, 2);
    incluir(posicao, conteudo, tamanho, 3);
    incluir(posicao, conteudo, tamanho, 4);
    incluir(posicao, conteudo, tamanho, 5);
    incluir(posicao, conteudo, tamanho, 6); { Vai acusar pilha cheia }
    
    remover(posicao); { Vai remover o 5 (o último que conseguiu entrar) }

    incluir(posicao, conteudo, tamanho, 6); { O 6 entra no lugar do 5 no topo }

    writeln('Topo atual: ', consultar(posicao, conteudo)); { Vai imprimir 6 }

    escrever(posicao, conteudo); { Imprime do 6 (topo) até o 1 (base) }
    
    incluir(posicao, conteudo, tamanho, 7); { Vai acusar pilha cheia }
end.