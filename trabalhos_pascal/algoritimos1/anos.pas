program anos;
var idade : Integer;
var nome : String;
begin
    WriteLn('Informe o seu nome:');
    ReadLn(nome);
    WriteLn('Informe a sua idade:');
    ReadLn(idade);
    WriteLn(nome, ', você tem ', idade*365, ' dias de idade.');
end.