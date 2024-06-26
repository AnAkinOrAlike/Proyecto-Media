<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Base representada</title>
    <link rel='stylesheet' href='main.css?.0'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>
<body>
    <div class="table">
        <?php
            $db = new PDO('sqlite:main.sqlite');
            $query = $db->query("
                SELECT 
                    M.*, 
                    V.STARS,
                    V.LAST_SEEN,
                    P.HOUSE,
                    T.CATEGORIA,
                    D.ARTIST,
                    T.DUR_CATG
                FROM 
                    MEDIA M 
                LEFT JOIN 
                    VISTAS V ON M.ID_MEDIA = V.ID_MEDIA 
                LEFT JOIN 
                    PRODUCTORAS P ON M.ID_HOUSE = P.ID_HOUSE
                LEFT JOIN 
                    DIRECTORES D ON M.ID_ARTST = D.ID_ARTST
                LEFT JOIN 
                    TYPE T ON M.ID_CATEG = T.ID_CATEG
                WHERE 
                    M.SEEN = 1
                ORDER BY 
                    RANDOM()
            ");
            $numGrid = 0;
            $totalRegistrosQuery = $db->query("SELECT COUNT(*) AS total FROM MEDIA WHERE SEEN = 1");
            $totalRegistro = $totalRegistrosQuery->fetch(PDO::FETCH_ASSOC)['total'];
        ?>

        <div class="grid">
            <?php if ($numGrid < $totalRegistro) {
                $registro = $query->fetch(PDO::FETCH_ASSOC);
                $numGrid++;
                $Hex = htmlspecialchars($registro['HEX_CLR']);
            ?>
                <div class="ghti" id="headline" style="background-color: <?php echo $Hex;?>">
                    <?php echo htmlspecialchars($registro['TITLE']);?>
                    <div class="rhyr"><?php echo htmlspecialchars($registro['YEAR']);?></div>
                </div>
                <div class="ghbs" id="box" style="background-color: <?php echo $Hex;?>" data-star="<?php echo htmlspecialchars($registro['STARS']);?>">
                    <div class="bstr gl" id="star">
                        <?php
                            $starCount = intval($registro['STARS']);
                            
                            for ($i = 0; $i < $starCount; $i++) {
                                echo '<span class="filled-star" style="color:'.$Hex.'">&#9733;</span>';
                            }
                            for ($i = 0; $i < 5 - $starCount; $i++) {
                                echo '<span class="empty-star">&#9734;</span>';
                            }
                            
                            ?>
                    </div>
                </div>
                <div class="gbim"><img class="bima gl" src="<?php echo htmlspecialchars($registro['IMG_URL']);?>" alt="<?php echo htmlspecialchars($registro['TITLE']);?>"></div>
                <div class="box dccol"><?php echo htmlspecialchars($registro['LENGHT']);?> <?php echo htmlspecialchars($registro['DUR_CATG']);?></div>
                <div class="box est"><?php echo htmlspecialchars($registro['ARTIST']);?></div>
                <div class="box dur"><?php echo htmlspecialchars($registro['HOUSE']);?></div><?php } ?>
                <div class="box dccol cv"><?php echo htmlspecialchars($registro['CATEGORIA']);?> vista el: <?php echo htmlspecialchars($registro['LAST_SEEN']);?></div>
        </div>

        <div class="grid">
            <?php if ($numGrid < $totalRegistro) {
                $registro = $query->fetch(PDO::FETCH_ASSOC);
                $numGrid++;
            ?>
                <div class="ghti" id="headbg">
                    <?php echo htmlspecialchars($registro['TITLE']);?>
                    <div class="rhyr"><?php echo htmlspecialchars($registro['YEAR']);?></div>
                </div>
                <div class="box hrow st" id="headpq" data-star="<?php echo htmlspecialchars($registro['STARS']);?>">
                    <div class="box ar gl star" id="bxstar">
                        <?php
                            $starCount = intval($registro['STARS']);
                            
                            for ($i = 0; $i < 5 - $starCount; $i++) {
                                echo '<span class="empty-star">&#9733;</span>';
                            }
                            for ($i = 0; $i < $starCount; $i++) {
                                echo '<span class="filled-star">&#9733;</span>';
                            }
                            
                            ?>
                    </div>
                </div>
                <div class="box im">
                    <img class="ima gl" src="<?php echo htmlspecialchars($registro['IMG_URL']);?>" alt="<?php echo htmlspecialchars($registro['TITLE']);?>">
                </div>
                <div class="box dccol"><?php echo htmlspecialchars($registro['LENGHT']);?> <?php echo htmlspecialchars($registro['DUR_CATG']);?></div>
                <div class="box est"><?php echo htmlspecialchars($registro['ARTIST']);?></div>
                <div class="box dccol cv"><?php echo htmlspecialchars($registro['CATEGORIA']);?> vista el: <?php echo htmlspecialchars($registro['LAST_SEEN']);?></div>
                <div class="box dur"><?php echo htmlspecialchars($registro['HOUSE']);?></div>
            <?php } ?>
        </div>

        <div class="grid base">
                <div class="box hrow ti" id="hr"><h1>Titulo</h1></div>
                <div class="box hrow st" id="mhr">
                    <div class="box ar gl star" id="star">
                        <input id="radio1" type="radio" name="estrellas" value="1"><!--
                            --><label for="radio1" id="star1">★</label><!--
                        --><input id="radio2" type="radio" name="estrellas" value="2"><!--
                            --><label for="radio2" id="star2">★</label><!--
                        --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                            --><label for="radio3" id="star3">★</label><!--
                        --><input id="radio4" type="radio" name="estrellas" value="4"><!--
                            --><label for="radio4" id="star4">★</label><!--
                        --><input id="radio5" type="radio" name="estrellas" value="5"><!--
                            --><label for="radio5" id="star5">★</label>
                    </div>
                </div>
                <div class="box im"><img class="ima gl" src="Imagenes/aang.jpg" alt="el avatar Aang"></div>
                <div class="box dccol">Distribuidora o Director</div>
                <div class="box est">Estreno</div>
                <div class="box dur">Duracion</div>
                <div class="box dccol cv">¡Categoría¡ vista el: ¡Visto¡</div>
        </div>
    </div>
<div style="display: flex;justify-content: center;">
    <button class="gl ar" onclick="location.reload();"><span class="material-symbols-outlined">refresh</span></button>
    <button class="gl ar"><span class="material-symbols-outlined">arrow_back</span></button>
    <input type="color" id="colorPicker" class="circ ar gl">
    <p><?php echo "Se muestran {$numGrid} div.grid  "; ?></p>
</div>
<script src="main.js"></script> 
</body>
</html>