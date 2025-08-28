program atividade11;
var array2D : array[1..10, 1..10] of integer;
var l, c, linhas : integer;
begin
    readln(linhas);

    for l := 1 to linhas do
    begin
        writeLn();
        for c := 1 to l do
        begin
            if (c = 1) or (c = l) then
            begin
                array2D[l,c] := 1;
                write('-',array2D[l,c]);
            end
            else if c < l then
            begin
                array2D[l,c] := array2D[l-1, c] + array2D[l-1, c-1];
                write('-',array2D[l,c]);
            end;
        end;
    end;
end.