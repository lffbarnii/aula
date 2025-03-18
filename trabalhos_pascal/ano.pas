program ano;
var mes, dia: Integer;
begin
    WriteLn('Informe o dia e o mês.');
    ReadLn(dia, mes);
    WriteLn('Se passaram ', (((mes-1)*30)+dia-1), ' dias nesse ano.');
end.