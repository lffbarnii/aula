program alfabeto;
var x : Char;
begin
	x := 'a';
  while x <= 'z' do
  begin
      WriteLn(x);
      x := chr(ord(x) + 1);
  end
end.