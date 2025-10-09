Program Alg24;

type
  reg_net = record    
		codigo:integer;		
		email:String[30];
		plano:integer;
		horas:real;
		site:char;
		valor:real;
	end;
	
	vet_net = array[1..500] of reg_net;

var 
  lista:vet_net;
  N, I:integer;  

Begin
  write ('Informe qtdade de clientes: ');
	readln (N);
	for i:= 1 to N do
	  with lista[i] do
		begin
      write ('Informe o código do cliente: ');
	    readln (codigo);
      write ('Informe o e-mail: ');
	    readln (email);
      write ('Informe o plano em Mb: ');
	    readln (plano);
      write ('Informe a qtde de horas acessadas: ');
	    readln (horas);
      write ('Cliente possui site: ');
	    readln (site);
			valor:=0.90*horas;
			if upcase(site) = 'S' then 
         valor:=valor+40;
      if plano <=100 then
         valor:=valor+59.9
      else 
			   if plano <=200 then
            valor:=valor+74.9
         else 
				    if plano <=500 then
               valor:=valor+109.9
            else
               valor:=valor+129.9
		end;
	clrscr;
  writeln ('Código                            E-mail  Plano  Horas  Site  Valor a Pagar');
  writeln;        
  for i:= 1 to N do
    with lista[i] do
	    begin				  
 	      write (codigo:6);
        write (email:34);
        write (plano:6);
        write (horas:8:2);
        write (site:3);
        writeln(valor:9:2);
      end
End.