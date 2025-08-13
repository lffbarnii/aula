program fazoL;
var gasolina, pagamento : Real;
begin
    WriteLn('Informe o preço da gasolina:');
    ReadLn(gasolina);
    WriteLn('Quanto você consegue pagar?:');
    ReadLn(pagamento);
    WriteLn('Você consegue comprar ', pagamento/gasolina, ' litros de gasolina.');
end.