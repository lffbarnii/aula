program graus;

var celsius : Real;

begin
    WriteLn('Informe a temperatura em graus célsius');
    ReadLn(celsius);

    WriteLn('A temperatura em graus farenheit é: ', (celsius*1.8)+32);
end.