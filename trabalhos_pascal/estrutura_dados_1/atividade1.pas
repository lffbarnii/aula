program atividade1;

type 
    Fila = record
        posicao : integer;
        conteudo : array[0..4] of integer;
        tamanho : integer;
    end;

function isFilaCheia(f : Fila): boolean;
begin
    isFilaCheia := (f.posicao > f.tamanho);
end;

function isFilaVazia(f : Fila): boolean;
begin
    isFilaVazia := (f.posicao = 0);
end;

procedure incluir(var f : Fila; valor : integer);
begin
    if isFilaCheia(f) then
        writeln('A fila está cheia')
    else
    begin
        f.conteudo[f.posicao] := valor;
        f.posicao := f.posicao + 1;
    end;
end;

procedure remover(var f : Fila);
var 
    i : integer;
begin
    if isFilaVazia(f) then
        writeln('A fila está vazia')
    else
    begin
        for i := 0 to f.posicao - 2 do
        begin
            f.conteudo[i] := f.conteudo[i + 1];
        end;

        f.posicao := f.posicao - 1;
    end;
end;

function consultar(f : Fila): integer;
begin
    if isFilaVazia(f) then
    begin
        writeln('Fila vazia');
        consultar := -1; 
    end
    else
        consultar := f.conteudo[0];
end;

procedure escrever(f : Fila);
var 
    i : integer;
begin
    for i := 0 to f.posicao - 1 do
        writeln(f.conteudo[i]);
end;

var 
    minhaFila : Fila;

begin
    minhaFila.posicao := 0;
    minhaFila.tamanho := 4;

    incluir(minhaFila, 1);
    incluir(minhaFila, 2);
    incluir(minhaFila, 3);
    incluir(minhaFila, 4);
    incluir(minhaFila, 5);
    incluir(minhaFila, 6);
    
    remover(minhaFila);

    incluir(minhaFila, 6);

    writeln(consultar(minhaFila));

    escrever(minhaFila);
    
    incluir(minhaFila, 6);
    incluir(minhaFila, 6);
    incluir(minhaFila, 6);
    incluir(minhaFila, 6);
end.