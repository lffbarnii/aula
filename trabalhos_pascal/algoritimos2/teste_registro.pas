program teste_registro;

type
    registro_aluno = record
        codigo : integer;
        nome   : String[40];
        n1     : real;
        n2     : real;
        n3     : real;
        media  : real;
    end;

    array_alunos = array[1..5] of registro_aluno;

var 
    alunos : array_alunos;

    n,  i  : integer;

begin
    for i := 1 to 5 do
        with alunos[i] do
        begin
            readln(codigo);
            readln(nome);
            readln(n1);
            readln(n2);
            readln(n3);
            media := (n1 + n2 + n3)/3
        end;

    for i := 1 to 5 do
        with alunos[i] do
        begin
            writeln('codigo:', codigo);
            writeln('nome: ',  nome);
            writeln('n1: ',    n1);
            writeln('n2: ',    n2);
            writeln('n3: ',    n3);
            writeln('media: ', media);
            writeln();
        end;
end.