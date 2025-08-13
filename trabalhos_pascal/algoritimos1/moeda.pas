program moeda;
var moeda1, moeda5, moeda10, moeda25, moeda50, moeda100 : Real;
begin
    WriteLn('Informe respectivamente a quantidade de moedas de 1, 5, 10, 25, 50 centavos e 1 real');
    ReadLn(moeda1, moeda5, moeda10, moeda25, moeda50, moeda100);
    WriteLn('total=', moeda1*0.01+moeda5*0.05+moeda10*0.1+moeda25*0.25+moeda50*0.5+moeda100);
end.