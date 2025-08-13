program restaurante;
var peso: Integer;
begin
    WriteLn('Informe o peso do seu prato.');
    ReadLn(peso);
    WriteLn('O valor da sua refeição é: ', (peso-0.150)*12);
end.