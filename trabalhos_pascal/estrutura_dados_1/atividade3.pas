program atividade3;

type 
    VetorLista = array[0..4] of string;

function isListaCheia(posicao, tamanho : integer): boolean;
begin
    isListaCheia := (posicao > tamanho);
end;

function isListaVazia(posicao : integer): boolean;
begin
    isListaVazia := (posicao = 0);
end;

function getPosicaoInserir(lista : VetorLista; valor : string; tamanho : integer): integer;
var i, posicao_inserir : integer;
var achou : boolean;
begin
    i := 0;
    achou := false;
    posicao_inserir := 1;

    while i < tamanho and not achou do
    begin
        if valor = lista[i] then
            writeln("O valor já está na lista!")
        else if valor < lista[i] or lista[i] = '' then
        begin
            achou := true;
            getPosicaoInserir := i;
        end;

        i := i + 1;
    end;
end;

procedure liberarEspaco(var lista : VetorLista; var posicao, posicao_destino : integer);
var i : integer;
begin
    for i := posicao downto posicao_destino + 1 do
    begin
        lista[i] := lista[i-1];
    end;
    posicao := posicao + 1;
end;

procedure incluir(var lista : VetorLista; var posicao, tamanho: integer; valor : string);
var posicao_inserir : integer;
begin
    if isListaCheia(posicao, tamanho) then
        writeln('A fila esta cheia')
    else if isListaVazia(posicao) then
    begin
        lista[0] := valor;
        posicao := posicao + 1;
    end
    else
    begin
        posicao_inserir := getPosicaoInserir(lista, valor, tamanho);
        liberarEspaco(lista, posicao, posicao_inserir);
        lista[posicao_inserir] := valor;
    end;
end;

procedure remover(var posicao : integer; var lista : VetorLista; valor : string);
var 
    i, posicao_remover : integer;
begin
    posicao_remover := 0;

    if isListaVazia(posicao) then
        writeln('A fila esta vazia')
    else
    begin
        for i := 0 to posicao -1 do
        begin
            if lista[i] = valor then
                posicao_remover := i
        end;

        for i := posicao_remover to posicao -1 do
        begin
            lista[i] := lista[i+1];
        end;

        posicao := posicao - 1;
    end;
end;

function consultar(posicao : integer; lista : VetorLista; valor : string): integer;
var i, posicao_consultada : integer;
posicao_consultada := -1;
begin
    if isListaVazia(posicao) then
    begin
        writeln('Fila vazia');
        consultar := -1; 
    end
    else
    begin
        for i := 0 to posicao - 1 do
        begin
            if lista[i] = valor then
                posicao_consultada := i;
        end;
    end;

    if posicao_consultada = -1 then
        writeln('Elemento não encontrado!')

    consultar := posicao_consultada;
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
    lista : VetorLista;
    tamanho : integer;

begin
    posicao := 0;
    tamanho := 4;

    incluir(lista, posicao, tamanho, "Luis");
    incluir(lista, posicao, tamanho, "Gabi");
    incluir(lista, posicao, tamanho, "Pudim");
    incluir(lista, posicao, tamanho, "Pipoca");
    incluir(lista, posicao, tamanho, "Isabela");
    incluir(lista, posicao, tamanho, "Teste");
    
    remover(posicao, lista, "Luis");

    incluir(lista, posicao, tamanho, "Teste");

    writeln(consultar(posicao, lista, "Gabi"));

    escrever(posicao, lista);
    
    incluir(lista, posicao, tamanho, "Teste");
end.