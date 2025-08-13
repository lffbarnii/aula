program coordenada;
var x1, x2, y1, y2 : Integer;
begin
    WriteLn('as coordenadas do primeiro ponto:');
    ReadLn(x1, y1);
    WriteLn('as coordenadas do segundo ponto:');
    ReadLn(x2, y2);
    WriteLn('a distância entre os dois pontos: ', (y1-y2)+(x1-x2));
end.