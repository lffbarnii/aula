program somaab;
var a, b, c: real;
begin
    ReadLn(a, b, c);
    
    if (a+b) < c then
        ('a + b menor que c')
    else
        WriteLn('a + b maior ou igual a c');
end.