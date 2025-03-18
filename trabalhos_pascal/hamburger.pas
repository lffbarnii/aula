program hamburger;
var sanduiches : Integer;
begin
    WriteLn('quantos sanduíches serão feitos');
    ReadLn(sanduiches);
    Write('deverão ser comprados: ', sanduiches*2*0.05, ' quilos de queijo, ', sanduiches*0.05, ' quilos de presunto e ', sanduiches*0.1, ' quilos de hamburger');
end.