program sombra;
var sombraPredio, altura, sombra : Real;
begin
    WriteLn('Informe a sua altura, o tamanho da sua sombra e a sombra do prédio');
    ReadLn(altura, sombra, sombraPredio);
    WriteLn('altura predio=', (sombraPredio*altura)/sombra);
end.    