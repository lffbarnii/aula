program notaPonderada;
var nota1, nota2, nota3: Real;
begin
    WriteLn('Informe 3 notas.');
    ReadLn(nota1, nota2, nota3);
    WriteLn('A média ponderada das notas é: ', ((nota1*1)+(nota2*2)+(nota3*3))/6);
end.