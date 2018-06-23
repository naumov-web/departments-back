<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE `refresh_department` (IN dep_id INT)
                BEGIN
                    UPDATE `departments` SET 
                      `staffes_count` = (
                          SELECT COUNT(`id`) FROM `department_staffes` WHERE `department_id` = dep_id
                      ),
                      `max_salary` = (
                          COALESCE((SELECT MAX(`staffes`.`salary`) FROM `department_staffes` 
                            INNER JOIN `staffes` ON `staffes`.`id` = `department_staffes`.`staff_id`
                            WHERE `department_id` = dep_id), 0)
                      )
                    WHERE (`id` = dep_id);
                END
            ');
        DB::unprepared('
            CREATE TRIGGER `on_insert_department_staffes`
                AFTER INSERT ON `department_staffes` FOR EACH ROW
                BEGIN
                    CALL refresh_department(NEW.department_id);
                END
            ');
        DB::unprepared('
            CREATE TRIGGER `on_delete_department_staffes`
                AFTER DELETE ON `department_staffes` FOR EACH ROW
                BEGIN
                    CALL refresh_department(OLD.department_id);
                END
            ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS `on_insert_department_staffes`;
            DROP TRIGGER IF EXISTS `on_delete_department_staffes`;
            DROP PROCEDURE IF EXISTS `refresh_department`;
        ');
    }
}
