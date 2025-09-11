program atividade16;

var lineIndex, columnIndex : integer;
var lineSum, columnSum : array[1..3] of real;
var matrix : array[1..3, 1..3] of real;

begin
    for lineIndex := 1 to 3 do
    begin
        for columnIndex := 1 to 3 do
        begin
            matrix[lineIndex][columnIndex] := random(11);
            lineSum[lineIndex]     := lineSum[lineIndex]     + matrix[lineIndex][columnIndex];
            columnSum[columnIndex] := columnSum[columnIndex] + matrix[lineIndex][columnIndex];
        end;
    end;

    writeln('Matrix');

    for lineIndex := 1 to 3 do
    begin
        writeln();
        for columnIndex := 1 to 3 do
        begin
            write('|', matrix[lineIndex][columnIndex]);
        end;

        write(' = ', lineSum[lineIndex]);
    end;

	writeln();
    writeln('--------------------------');

    for columnIndex := 1 to 3 do
    begin
        write('|', columnSum[columnIndex]);
    end;
end.