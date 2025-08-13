program horaExtra;
var horas : Integer;
begin
    WriteLn('quantas horas o funcionário trabalha?');
    ReadLn(horas);
    if (horas > 44) then
    begin
      Write('O salário bruto do funcionário é de ', ((44*10) + ((horas-44)*15)), ' e o salário liquido é de ', ((44*10) + ((horas-44)*15))*0.9);
    end
    else
    begin
      Write('O salário bruto do funcionário é de ', horas*10, ' e o salário liquido é de ', (horas*10)*0.9);
    end;
end.