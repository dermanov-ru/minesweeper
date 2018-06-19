<?php
/**
 * Created by PhpStorm.
 * User: dev@dermanov.ru
 * Date: 17.06.2018
 * Time: 21:07
 *
 *
 */
 
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Minesweeper</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="/assets/css/main.css?v=<?=filemtime($_SERVER["DOCUMENT_ROOT"] . "/assets/css/main.css")?>" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://unpkg.com/vue"></script>
</head>
<body>
    <div id="minesweeper" class="minesweeper">
        
        <div v-if="!game_prepared">
            <p>Выберите уровень
                <select name="" id="" v-model="level" placeholder="- Выбрать уровень -">
                    <option v-for="(level, index) in levels" v-bind:value="level" >
                        {{ level.title }}
                    </option>
                </select>
            </p>
            
            <p>
                <button @click="prepare_game">Начать игру</button>
            </p>
        </div>
    
        <div v-if="game_prepared">
            <div class="status_bar titlle">
                <div class="item" title="">Игра "Сапер"</div>
                <div class="item sep">|</div>
                <div class="item" title=""><a href="https://derm.su/48c" target="_blank">Правила игры</a></div>
            </div>
            <div class="status_bar">
                <div class="item" title="Режим игры">{{level.title}}</div>
                <div class="item sep">|</div>
                <div class="item" title="Время игры">{{game_time_formated}}</div>
                <div class="item sep">|</div>
                <div class="item" title="Отмечено мин / Всего мин">{{marked_count}} / {{mines_count}}</div>
            </div>
            
            <div v-if="game_over">
                <p v-if="!game_won"><strong>Игра окончена, вы проиграли!</strong></p>
                <p v-if="game_won"><strong>Ура, вы победили!</strong></p>
                <button @click="repeat_game">Повторить игру</button>
                <button @click="reset_game">Выбрать другой уровень</button>
            </div>
    
    
            <div class="table">
                <template v-for="item in level.size">
                    <div class="row">
                        <div v-for="item1 in level.size" class="cell default" @click.left="open_cell" @click.right.prevent="mark_cell"></div>
                    </div>
                </template>
            </div>
        </div>
    
        
    </div>

    <script src="/assets/js/cell.js?v=<?=filemtime($_SERVER["DOCUMENT_ROOT"] . "/assets/js/cell.js")?>"></script>
    <script src="/assets/js/main.js?v=<?=filemtime($_SERVER["DOCUMENT_ROOT"] . "/assets/js/main.js")?>"></script>
</body>
</html>
