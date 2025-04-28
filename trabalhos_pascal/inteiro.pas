program inteiro;
var a: Integer;
begin
    WriteLn('Informe um número');
    ReadLn(a);
    
    if ((a div 2)*2) <> a  then
        WriteLn('Par')
    else
        WriteLn('Ímpar');
end.