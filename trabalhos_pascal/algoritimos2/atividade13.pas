program atividade13;

var array2D : array[1..4, 1..4] of real;
var l, c : integer;

begin
    for l := 1 to 4 do
    begin
        writeLn();
        for c := 1 to 4 do
        begin
            array2D[l,c] := random(10)+1;
            write('   ', array2D[l,c]);
        end;
    end;

    writeLn();
    writeLn('------------------------------');

    for l := 1 to 4 do
    begin
        for c := 1 to 4 do
        begin
            if(l <> c) then
                array2D[l,c] := array2D[l,c] /  array2D[l,l];
        end;
    end;

    for l := 1 to 4 do
    begin
        writeLn();
        for c := 1 to 4 do
        begin
            if(l = c) then
                array2D[l,c] := array2D[l,c] /  array2D[l,l];
            write('   ', array2D[l,c]);
        end;
    end;
end.