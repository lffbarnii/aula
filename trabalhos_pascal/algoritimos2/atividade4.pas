program atividade4;

const lineQtt   = 3;
const columnQtt = 3;

var array2D : array[1..3, 1..3] of integer;
var lineIndex, columnIndex, arrayIndex : integer;

begin

    arrayIndex := 1;
    for lineIndex := 1 to lineQtt do
    begin
        for columnIndex := 1 to columnQtt do
        begin
            array2D[lineIndex, columnIndex] := arrayIndex;
            arrayIndex := arrayIndex + 1;
        end;
    end; 

    //Main Diagonal
    for lineIndex := 1 to lineQtt do
    begin
        writeLn(array2D[lineIndex, lineIndex]);
    end;

    writeLn('////////////////////////////////////////');

    //Upper Triangle
    for lineIndex := 1 to lineQtt do
    begin
        for columnIndex := 1 to columnQtt do
        begin
            if columnIndex > lineIndex then
                writeLn(array2D[lineIndex, columnIndex]);
        end;
    end;

    writeLn('////////////////////////////////////////');

    //Lower Triangle
    for lineIndex := 1 to lineQtt do
    begin
        for columnIndex := 1 to columnQtt do
        begin
            if columnIndex < lineIndex then
                writeLn(array2D[lineIndex, columnIndex]);
        end;
    end;

    writeLn('////////////////////////////////////////');

    //Secondary Diagonal
    for lineIndex := lineQtt downto 1 do
    begin
        for columnIndex := 1 to columnQtt do
        begin
            if lineIndex + columnIndex = lineQtt + 1 then
                writeLn(array2D[lineIndex, columnIndex]);
        end;
    end; 

end.