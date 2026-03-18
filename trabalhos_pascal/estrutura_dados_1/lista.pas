program atividade2;

type 
    VetorLista = array[0..4] of string;

function isFilaCheia(lista : VetorLista, tamanho : integer): boolean;
var i : integer
i := tamanho - 1

begin
end;

function isFilaVazia(posicao : integer): boolean;
begin
    isFilaVazia := (posicao = 0);
end;

procedure incluir(var posicao : integer; var conteudo : VetorLista; tamanho, valor : integer);
begin
    if isFilaCheia(posicao, tamanho) then
        writeln('A fila esta cheia')
    else
    begin
        conteudo[posicao] := valor;
        posicao := posicao + 1;
    end;
end;

procedure remover(var posicao : integer; var conteudo : VetorLista);
var 
    i : integer;
begin
    if isFilaVazia(posicao) then
        writeln('A fila esta vazia')
    else
    begin
        for i := 0 to posicao - 2 do
        begin
            conteudo[i] := conteudo[i + 1];
        end;

        posicao := posicao - 1;
    end;
end;

function consultar(posicao : integer; conteudo : VetorLista): integer;
begin
    if isFilaVazia(posicao) then
    begin
        writeln('Fila vazia');
        consultar := -1; 
    end
    else
        consultar := conteudo[0];
end;

procedure escrever(posicao : integer; conteudo : VetorLista);
var 
    i : integer;
begin
    for i := 0 to posicao - 1 do
        writeln(conteudo[i]);
end;

var 
    posicao : integer;
    conteudo : VetorLista;
    tamanho : integer;

begin
    posicao := 0;
    tamanho := 4;

    incluir(posicao, conteudo, tamanho, 1);
    incluir(posicao, conteudo, tamanho, 2);
    incluir(posicao, conteudo, tamanho, 3);
    incluir(posicao, conteudo, tamanho, 4);
    incluir(posicao, conteudo, tamanho, 5);
    incluir(posicao, conteudo, tamanho, 6);
    
    remover(posicao, conteudo);

    incluir(posicao, conteudo, tamanho, 6);

    writeln(consultar(posicao, conteudo));

    escrever(posicao, conteudo);
    
    incluir(posicao, conteudo, tamanho, 6);
    incluir(posicao, conteudo, tamanho, 6);
    incluir(posicao, conteudo, tamanho, 6);
    incluir(posicao, conteudo, tamanho, 6);
end.