program numeroMaior;

var
  x, y: Real;

begin
  writeln('Digite o primeiro n�mero:');
  readln(x);
  writeln('Digite o segundo n�mero:');
  readln(y);
  
  if x > y then
  	begin
  		writeln(x, ' � maior que ', y);
  	end
  else if y > x then
  	begin 
  		writeln(y, ' � maior que ', x);
  	end
  else
  	writeln('os dois n�meros s�o iguais');
end.
