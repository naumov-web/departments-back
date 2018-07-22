<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddOnUpdateStaffesTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `on_update_staffes`
                AFTER UPDATE ON `staffes` FOR EACH ROW
                BEGIN
                    DECLARE DepartmentId integer;
                    Declare done integer default 0;
                    DECLARE DepartmentCursor Cursor FOR SELECT `department_id` FROM `department_staffes` WHERE `staff_id` = NEW.id;
                    DECLARE CONTINUE HANDLER FOR SQLSTATE \'02000\' SET done=1;
                    OPEN DepartmentCursor;
                    WHILE done = 0 DO 
                      FETCH DepartmentCursor INTO DepartmentId;
                      CALL refresh_department(DepartmentId);
                    END WHILE;
                    CLOSE DepartmentCursor;
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
            DROP TRIGGER IF EXISTS `on_update_staffes`;
        ');
    }
}
