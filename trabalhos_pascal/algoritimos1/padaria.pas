program padaria;
var paozin, broa : Integer;
begin
    WriteLn('Informe a quantidade de pãozinhos vendidos:');
    ReadLn(paozin);
    WriteLn('Informe a quantidade de broas vendidas:');
    ReadLn(broa);
    WriteLn('A quantidade arrecadada com as vendas de pães e broas hoje foi: ', (paozin*0.12)+(broa*1.5));
    WriteLn('A quantidade de dinheiro que deve ser armazenada na poupança é de: ', ((paozin*0.12)+(broa*1.5))/10)
end.