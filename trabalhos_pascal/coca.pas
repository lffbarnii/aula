program coca;
var lata, garrafa600, garrafa2 : Integer;
begin
    WriteLn('informe a quantidade de latas, garrafas de 600 e de garrafas de 2l compradas:');
    ReadLn(lata, garrafa600, garrafa2);
    WriteLn('a quantidade total de coca é de '(lata*0.350)+(garrafa600*0.600)+(garrafa2*2000), ' ml');
end.