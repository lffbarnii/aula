program atividade5;

var vetor : array[1..10] of integer;
var index1, index2, used, x : integer;

begin
    index1 := 1;
    while index1 <= 10 do
    begin
        writeLn('Informe um valor');
        readln(x);

        for index2 := 1 to index1 do
        begin
            used := 0;
            if vetor[index2] = x then
                used := 1
            else
        end;

        if used = 1 then
            writeLn('NAO PODE >:(')
        else
        begin
            writeLn('Ok');
            vetor[index1] := x;
            index1 := index1 + 1;
        end;
    end;
end.