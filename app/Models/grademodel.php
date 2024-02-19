<?php
namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table = 'grades'; // Assuming your table name is 'grades'

    public function getStudentGrades($id)
    {
        $builder = $this->db->table('grades');
        $builder->select('subject, grade');
        $builder->where('id', $student_id); // Assuming 'id' is the foreign key in the 'grades' table
        $query = $builder->get();

        return $query->getResult();
    }
}
