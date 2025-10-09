Program Exemplo_registro;

type
  reg_aluno = record
    codigo:integer;
		Nome:String[40];
		N1:real;
		N2:real;
		N3:real;
		Media:real;
	end;
	
	vet_aluno = array[1..30] of reg_aluno;

var 
  aluno:vet_aluno;
  N, I:integer;

Begin
  write ('Informe qtdade de alunos: ');
	readln (N);
	for i:= 1 to N do
	  begin
      write ('Informe código do aluno: ');
	    readln (aluno[i].codigo);
      write ('Informe nome do aluno: ');
	    readln (aluno[i].nome);
      write ('Informe 3 notas do aluno: ');
	    readln (aluno[i].n1,aluno[i].n2,aluno[i].n3);
      aluno[i].media:=(aluno[i].n1+aluno[i].n2+aluno[i].n3)/3;
		end;		 
	clrscr;
  writeln ('Dados Cadastrados ');
  writeln ('Cód. Nome                                      N1    N2    N3    Média');
	writeln;
	for i:= 1 to N do
	  begin
	    write (aluno[i].codigo:5);
	    write (aluno[i].nome:40);
	    write (aluno[i].n1:6:2,aluno[i].n2:6:2,aluno[i].n3:6:2);
      writeln(aluno[i].media:6:2);
		end;		 
End.