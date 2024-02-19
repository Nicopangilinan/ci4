<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $allowedFields = ['first_name','last_name', 'address'];

    public function __construct(){
        parent::__construct(); // Call the parent constructor
    }

    public function insert_data($data) {
        // Attempt to insert data into the 'students' table
        if ($this->db->table($this->table)->insert($data)) {
            // If insertion is successful, return the ID of the inserted row
            return $this->db->insertID();
        } else {
            // If insertion fails, return false
            return false;
        }
    }

    // Function to retrieve grades for a specific student ID
    public function getGradesById($id) {
        // Get an instance of the Query Builder
        $query = $this->db->table('grades');

        // Select all columns from the 'grades' table where the 'id' column matches $id
        $query->where('id', $id);

        // Execute the query and fetch the result
        $results = $query->get()->getResult();

        // Return the result
        return $results;
    }


    }
    
    
?>
