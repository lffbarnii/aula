program voto;
var idade: Integer;
begin
    WriteLn('Informe sua idade.');
    ReadLn(idade);
    if idade >= 18 then
        WriteLn('Você pode votar.')
    else
        WriteLn('Você não pode votar.');
end.