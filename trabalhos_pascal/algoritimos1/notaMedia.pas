Program notaMedia;
var
	nota1, nota2, nota3 : real;
Begin
    writeln('digite a primeira nota do aluno:');
    readln(nota1);
    writeln('digite a segunda nota do aluno:');
    readln(nota2);
    writeln('digite a terceira nota do aluno:');
    readln(nota3);
    writeln('a média das notas é: ', (nota1+nota2+nota3)/3);
End.