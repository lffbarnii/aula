<?php
 
$array = [['Disciplina',      'Faltas', 'Média'], 
          ['Matemática',      5,        8.5    ], 
          ['Portugês',        2,        9      ],
          ['Geografia',       10,       6      ],
          ['Educação Física', 2,        8      ]];



echo '<table border="1">';

for($i = 0; $i < 5; $i++){
    echo '<tr>';

    for($s = 0; $s < 3; $s++){
        echo '<td>'.$array[$i][$s].'</td>';
    }

    echo '</tr>';
}

echo '</table>';