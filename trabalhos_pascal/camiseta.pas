program camiseta;
var p, m, g: Real;
begin
    WriteLn('Informe a quantidade de camisetas p, m e g na venda:');
    ReadLn(p, m, g);
    WriteLn('O valor total da compra é: ', (p*10) + (m*12) + (g*15));
end.