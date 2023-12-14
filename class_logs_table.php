<?php
// Table-specific class - extends the data_operations class to apply to a specific database table.

class logs extends data_operations {

  // Constructor - must have same name as class.
  function logs() {

    $table = LOGS_TABLE;              // Constant defined in init.php
    $id_field = 'mpl_id';               // Primary Key field
    $id_field_is_ai = true;             // Is Primary Key Auto Increment?
    $fields = array(                    // Array of all non-PK fields
      'mpl_mpa_id',
      'mpl_timestamp',
      'mpl_ipad',
      'mpl_query'
    );

    // Parent class constructor
    // Sending it table-specific information enables this class to generate Active Record objects.
    parent::data_operations($table, $id_field, $id_field_is_ai, $fields);
  }

  /*
    This class inherits all methods in class_data_operations: load(), save(), load_from_form_submit(), etc
    That functionality is sufficient for operations on 1 Active Record.

    More complex data operations (JOINS, etc) require custom methods such as below.
    A table-specific ORM class such as this should contain all related data operations.
    This keeps the database logistics separate from the application logic in the PHP files that generate HTML.
  */

  //////////////////////////////////////////////////////////////////////////////////////////////
  static function get_log_info($mpl_id='') {
    // Get people, with an array of the names of the States visited.
    // Returns all people if called with no primary key: get_people_with_states()

    $sql_where_condition = "1";  // all people
    if ($mpl_id !== '' ) {
      $sql_where_condition = "mpl_id= $mpl_id";
    }

    // LEFT JOIN - still get a person if there are no matches in states table
    $sql = "SELECT * FROM " . ACCTS_TABLE . "
              WHERE  $sql_where_condition ";
    $result = lib::db_query($sql);

    // Filter out the redundency from the JOIN
    $logs = array();
    //while ( $row = $result->fetch_assoc() ) {
    //  $logs[$row['mpa_id']]['mpa_name'] = $row['mpa_name'];
    //}
    return $logs;
  }


} //end class

?>
