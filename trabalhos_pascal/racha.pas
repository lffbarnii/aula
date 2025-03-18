program racha;
var valor: Real;
var valorCA : Integer;
begin
    WriteLn('Informe o valor da conta.');
    ReadLn(valor);
    valorCA := Round(valor/3);
    WriteLn('carlos e andré pagarão ', valorCA, ' enquanto felipe pagará: ', valor-(valorCA*2));
end.