program acidentes;
var dias, anos, meses: Integer;
begin
    WriteLn('Informe a quantidade de dias sem acidentes.');
    ReadLn(dias);
    while (dias >= 365) do
    begin
      dias := dias-365;
      anos := anos+1;
    end;
    while (dias >= 30) do
    begin
      dias := dias-30;
      anos := meses+1;
    end;
    WriteLn('Não ocorrem acidentes há ', anos, ' anos, ', meses, ' meses, e ', dias, ' dias' );
end.