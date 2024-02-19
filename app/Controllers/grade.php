<?php
// Student controller

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;
use App\Models\GradeModel;

class StudentController extends BaseController
{
    use ResponseTrait;

    public function view($id)
    {
        // Fetch student details
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        if (!$student) {
            return $this->failNotFound('Student not found');
        }

        // Fetch grade details based on student's gradeId
        $gradeModel = new GradeModel();
        $grade = $gradeModel->find($student['id']);

        if (!$grade) {
            return $this->failNotFound('Grade details not found');
        }

        // Prepare response data
        $responseData = [
            'student' => $student,
            'gradeId' => $grade_id['gradeId'], // Define gradeId
            'subject' => $subject['subject'],  // Define subject
            'grade' => $grade['grade']        // Define grade
        ];

        return $this->respond($responseData);
    }
}
