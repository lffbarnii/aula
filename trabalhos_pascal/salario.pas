program salario;

var
  salario: Real;

begin
  writeln('Digite o sal�rio do funcionario:');
  readln(salario);
  
  if salario > 400 then
  	begin
  		salario := salario*1.3;
  		writeln('o novo sal�rio do funcion�rio � de: ', salario);
  	end
  else
  	writeln('n�o houve mudan�a no sal�rio do funcion�rio');
end.