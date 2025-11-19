program conjuntos;

const
    TAMANHO_VETOR_MAXIMO = 20;

type
    TVetor = array[1..TAMANHO_VETOR_MAXIMO] of integer;

var
    vetorA, vetorB, uniao, interseccao, diferenca : TVetor;
    tamanhoA, tamanhoB, tamanhoU, tamanhoI, tamanhoD : integer;

procedure le_vetor(var v : TVetor; tamanho : integer);
var
    i : integer;
begin
    for i := 1 to tamanho do
    begin
        writeln('Informe o ', i, 'º número');
        readln(v[i]);
    end;
end;

procedure escreve_vetor(var v : TVetor; tamanho : integer);
var
    i : integer;
begin
    for i := 1 to tamanho do
        writeln(v[i]);
end;

function is_numero_in_vetor(numero : integer; arr : TVetor; tamanho : integer) : boolean;
var
    i : integer;
begin
    for i := 1 to tamanho do
    begin
        if numero = arr[i] then
        begin
            is_numero_in_vetor := true;
            exit;
        end;
    end;
    is_numero_in_vetor := false;
end;

procedure cria_vetor_uniao(var vetorUniao : TVetor; var tamanhoU : integer; vetorA : TVetor; tamanhoA : integer; vetorB : TVetor; tamanhoB : integer);
var
    i : integer;
begin
    tamanhoU := 0;
    for i := 1 to tamanhoA do
    begin
        if not is_numero_in_vetor(vetorA[i], vetorUniao, tamanhoU) then
        begin
            vetorUniao[tamanhoU + 1] := vetorA[i];
            tamanhoU := tamanhoU + 1;
        end;
    end;

    for i := 1 to tamanhoB do
    begin
        if not is_numero_in_vetor(vetorB[i], vetorUniao, tamanhoU) then
        begin
            vetorUniao[tamanhoU + 1] := vetorB[i];
            tamanhoU := tamanhoU + 1;
        end;
    end;
end;

procedure cria_vetor_interseccao(var vetorInterseccao : TVetor; var tamanhoI : integer; vetorA : TVetor; tamanhoA : integer; vetorB : TVetor; tamanhoB : integer);
var
    i : integer;
begin
    tamanhoI := 0;
    for i := 1 to tamanhoA do
    begin
        if is_numero_in_vetor(vetorA[i], vetorB, tamanhoB) then
        begin
            if not is_numero_in_vetor(vetorA[i], vetorInterseccao, tamanhoI) then
            begin
                vetorInterseccao[tamanhoI + 1] := vetorA[i];
                tamanhoI := tamanhoI + 1;
            end;
        end;
    end;
end;

procedure cria_vetor_diferenca(var vetorDiferenca : TVetor; var tamanhoD : integer; vetorA : TVetor; tamanhoA : integer; vetorB : TVetor; tamanhoB : integer);
var
    i : integer;
begin
    tamanhoD := 0;
    for i := 1 to tamanhoA do
    begin
        if not is_numero_in_vetor(vetorA[i], vetorB, tamanhoB) then
        begin
            if not is_numero_in_vetor(vetorA[i], vetorDiferenca, tamanhoD) then
            begin
                vetorDiferenca[tamanhoD + 1] := vetorA[i];
                tamanhoD := tamanhoD + 1;
            end;
        end;
    end;
end;

begin
    writeln('Informe o tamanho do vetor A');
    readln(tamanhoA);
    le_vetor(vetorA, tamanhoA);

    writeln('Informe o tamanho do vetor B');
    readln(tamanhoB);
    le_vetor(vetorB, tamanhoB);

    cria_vetor_uniao(uniao, tamanhoU, vetorA, tamanhoA, vetorB, tamanhoB);
    cria_vetor_interseccao(interseccao, tamanhoI, vetorA, tamanhoA, vetorB, tamanhoB);
    cria_vetor_diferenca(diferenca, tamanhoD, vetorA, tamanhoA, vetorB, tamanhoB);

    writeln('Vetor A:');
    escreve_vetor(vetorA, tamanhoA);
    writeln('----------------------------------');

    writeln('Vetor B:');
    escreve_vetor(vetorB, tamanhoB);
    writeln('----------------------------------');

    writeln('Vetor União:');
    escreve_vetor(uniao, tamanhoU);
    writeln('----------------------------------');

    writeln('Vetor Intersecção:');
    escreve_vetor(interseccao, tamanhoI);
    writeln('----------------------------------');

    writeln('Vetor Diferença:');
    escreve_vetor(diferenca, tamanhoD);
    writeln('----------------------------------');
end.
