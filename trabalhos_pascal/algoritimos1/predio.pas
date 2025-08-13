program predio;
    var x,y : Real;
begin
    WriteLn('Informe a altura dos 3 primeiros andares:');
    ReadLn(x);
    WriteLn('Agora informe a altura dos outros 12 andares:');
    ReadLn(y);
    WriteLn('A altura do prédio é de ', (x*3)+(y*12), ' metros.');
end.