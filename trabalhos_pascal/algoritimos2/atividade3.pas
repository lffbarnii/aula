program atividade3;

const teamQtt = 10;
const roundQtt = 10;
const gameQtt = teamQtt div 2;

var roundIndex, gameIndex, house, challenger : integer;
begin
    for roundIndex := 1 to roundQtt do
    begin
        writeLn('========Rodada ', roundIndex, '========');
        house := 1;
        challenger := teamQtt - roundIndex + 1;

        if challenger = 1 then
            challenger := teamQtt;

        if roundIndex mod 2 <> 0 then
            writeLn(house, ' X ', challenger)
        else
            writeLn(challenger, ' X ', house);

        for gameIndex := 2 to gameQtt do
        begin
        if gameIndex = 2 then
            house := challenger + 1
        else
            house := house + 1;

        if house > teamQtt then
            house := 2;

        challenger := challenger - 1;

        if challenger = 1 then
            challenger := teamQtt;

        if roundIndex mod 2 <> 0 then
            writeLn(house, ' X ', challenger)
        else
            writeLn(challenger, ' X ', house);
        end;
    end;
end.