program raizes;
var a, b, c, r1, r2, delta: Real;

begin
    ReadLn(a,b,c);
    delta := (b*b) - 4*a*c;
    if delta > 0 then
    begin
        r1 := ((-b) + Sqrt(delta))/(2*a);
        r2 := ((-b) - Sqrt(delta))/(2*a);
        WriteLn('Raizes: ', r1,',',r2);
    end
    else if delta = 0 then
    begin
        r1 := ((-b) + Sqrt(delta))/(2*a);
        WriteLn('Raiz: ', r1);
    end
    else
        WriteLn('Não existem raízes');
end.