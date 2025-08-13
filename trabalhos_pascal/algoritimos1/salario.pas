program salario;

var
  salario: Real;

begin
  writeln('Digite o salário do funcionario:');
  readln(salario);
  
  if salario > 400 then
  	begin
  		salario := salario*1.3;
  		writeln('o novo salário do funcionário é de: ', salario);
  	end
  else
  	writeln('não houve mudança no salário do funcionário');
end.