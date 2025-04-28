program imposto;
var salario : Real;
begin
    WriteLn('Informe o salário.');
    ReadLn(salario);
    WriteLn('o salário após 15 porcento de aumento é: ', salario*1.15, ', e após os impostos fica: ', salario*1.15*0.92);
end.