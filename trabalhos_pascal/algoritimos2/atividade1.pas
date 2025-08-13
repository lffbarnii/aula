Program Algoritmo01;

var v: array[1..10] of integer;
    media:real;
		s,i,qtde:integer;
		
begin
	for i:= 1 to 10 do
	begin
	  write ('Informe o valor: ');
		readln (v[i]);
		if v[i] > 0 then
		begin
		   s:=s + v[i];
		   qtde:= qtde+1
		end;
	end;
	writeln ('M�dia: ', s/qtde:5:2);
end.