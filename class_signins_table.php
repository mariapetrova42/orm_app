<?php
// Table-specific class - extends the data_operations class to apply to a specific database table.

class signins extends data_operations {

  // Constructor - must have same name as class.
  function signins() {

    $table = SIGNINS_TABLE;              // Constant defined in init.php
    $id_field = 'mps_token';               // Primary Key field
    $id_field_is_ai = false;             // Is Primary Key Auto Increment?
    $fields = array(                // Array of all non-PK fields
      'mps_mpa_id',
      'mps_time_init',
      'mps_time_edit',
      'mps_ipad',
    );

    // Parent class constructor
    // Sending it table-specific information enables this class to generate Active Record objects.
    parent::data_operations($table, $id_field, $id_field_is_ai, $fields);
  }

  /*
    This class inherits all methods in class_data_operations: load(), save(), load_from_form_submit(), etc
    That functionality is sufficient for operations on 1 Active Record.

    More compsex data operations (JOINS, etc) require custom methods such as below.
    A table-specific ORM class such as this should contain all related data operations.
    This keeps the database logistics separate from the application logic in the PHP files that generate HTML.
  */

  //////////////////////////////////////////////////////////////////////////////////////////////
  static function get_signin_info($mps_token='') {
    // Get people, with an array of the names of the States visited.
    // Returns all people if called with no primary key: get_people_with_states()

    $sql_where_condition = "1";  // all people
    if ($mps_token !== '' ) {
      $sql_where_condition = "mps_token= $mps_token";
    }

    // LEFT JOIN - still get a person if there are no matches in states table
    $sql = "SELECT * FROM " . ACCTS_TABLE . "
              WHERE  $sql_where_condition ";
    $result = lib::db_query($sql);

    // Filter out the redundency from the JOIN
    $signins = array();
    //while ( $row = $result->fetch_assoc() ) {
    //  $signins[$row['mpa_id']]['mpa_name'] = $row['mpa_name'];
    //}
    return $signins;
  }


} //end class

?>
