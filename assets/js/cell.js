/**
 * Created by PhpStorm.
 * User: dev@dermanov.ru
 * Date: 18.06.2018
 * Time: 13:13
 *
 *
 */

'use strict';

class Cell {
    constructor(el) {
        this.el = el;
        this.has_mine = false;
        this.is_opened = false;
        this.is_marked = false;

        // just declare fields, fill it later
        this.mines_cells_around_count = 0;
        this.around_cells = [];
    }

    mark() {
        this.is_marked = true;
        $(this.el).addClass("flag");
    }

    unmark() {
        this.is_marked = false;
        $(this.el).removeClass("flag");
    }

    open() {
        this.is_opened = true;

        if (this.has_mine)
            $(this.el).addClass("mine");
        else {
            $(this.el).addClass("open");

            // auto open all cells around, if there is no mines
            if (!this.mines_cells_around_count) {
                for (let i = 0; i < this.around_cells.length; i++){
                    let cell = this.around_cells[ i ];

                    if (!cell.is_opened)
                        cell.open();
                }
            }
        }

        $(this.el).text(this.mines_cells_around_count);

        return this.has_mine;
    }

}