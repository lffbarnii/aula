program condicional;
var a, b : Integer;
begin
    WriteLn('Informe dois números.');
    ReadLn(a, b);
    if a > b then
        WriteLn('O primeiro é maior que o segundo.')
    else
        if a < b then
            WriteLn('O segundo é maior que o primeiro.')
        else
            WriteLn('Os dois são iguais');
    WriteLn('**Fim do programa');
end.