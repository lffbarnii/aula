program atividade3_2;

const teamQtt = 5;
const roundQtt = 5;
const gameQtt = teamQtt div 2;

var roundIndex, gameIndex, house, challenger, bench : integer;
begin
    for roundIndex := 1 to roundQtt do
    begin
        writeLn('========Rodada ', roundIndex, '========');
        bench := roundIndex;

        house := bench + 1;

        if house > teamQtt then
            house := 1;

        challenger := teamQtt + (roundIndex - 1);

        if challenger > teamQtt then
            challenger := challenger - teamQtt;

        if roundIndex mod 2 <> 0 then
            writeLn(house, ' X ', challenger)
        else
            writeLn(challenger, ' X ', house);

        for gameIndex := 2 to gameQtt do
        begin
            house := house + 1;

            if house > teamQtt then 
                house := 1;

            challenger := house + 1;

            if challenger > teamQtt then
                challenger := 1;

            if roundIndex mod 2 <> 0 then
                writeLn(house, ' X ', challenger)
            else
                writeLn(challenger, ' X ', house);
        end;
    end;
end.