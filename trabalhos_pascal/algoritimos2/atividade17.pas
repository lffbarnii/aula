program atividade17;

var matrix : array[1..10, 1..10] of integer;
var lineIndex, columnIndex, otherIndex : integer;

begin
    for lineIndex := 1 to 10 do
    begin
        for columnIndex := 1 to 10 do
        begin
            matrix[lineIndex][columnIndex] := random(50);
            write(matrix[lineIndex][columnIndex] : 5);
        end;
        writeln();
    end;

    writeLn('==================================');

    for lineIndex := 1 to 10 do
    begin
        for columnIndex := 1 to 10 do
        begin
            for otherIndex := 2 to matrix[lineIndex][columnIndex] - 1 do
            begin
                if matrix[lineIndex][columnIndex] mod otherIndex = 0 then
                begin
                    matrix[lineIndex][columnIndex] := 0;
                    break
                end;
            end;
            write(matrix[lineIndex][columnIndex] : 5);
        end;
        writeln();
    end;
end.