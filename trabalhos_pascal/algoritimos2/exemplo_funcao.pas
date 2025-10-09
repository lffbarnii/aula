program Exemplo_registro;

type vetor = array[1..5] of integer;

procedure ler_vetor(var v : vetor; tam : integer);
    var i : integer;

begin
    for i := 1 to tam do
        readln(v[i]);
end;

procedure escrever_vetor(v: vetor; tam : integer);
    var i : integer;

begin
    for i := 1 to tam do
        writeln(v[i]);
end;

var a , b : vetor;

Begin
    ler_vetor(a, 5);
    writeln();
    escrever_vetor(a, 5);
End.
