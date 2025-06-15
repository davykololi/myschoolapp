<?php

namespace App\Services;

use Auth;

use Illuminate\Support\Str;
use App\Models\StudentInfo;
use App\Models\Student;
use App\Models\Stream;
use App\Repositories\StudentRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StudentFormRequest as StoreRequest;
use App\Http\Requests\StudentFormRequest as UpdateRequest;
use Illuminate\Http\Request;

class StudentService
{
	use ImageUploadTrait;
	protected $studentRepository;
	public $request;

	public function __construct(StudentRepository $studentRepository)
	{
		$this->studentRepository = $studentRepository;
	}

	public function all()
	{
		return $this->studentRepository->all();
	}

    public function paginated()
    {
        return $this->studentRepository->paginated(15);
    }

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->studentRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->studentRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->studentRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
		$data['admission_no'] = auth()->user()->school->initials."/".$request->admission_no."/".date('Y');
        $data['school_id'] = auth()->user()->school->id;
        $data['stream_id'] = $request->stream;
        $data['intake_id'] = $request->intake;
        $data['dormitory_id'] = $request->dormitory;
        $data['admin_id'] = Auth::user()->admin->id;
        $data['parent_id'] = $request->parent;
        $data['blood_group'] = $request->blood_group;
        $data['position'] = $request->student_position;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['active'] = $request->active;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('student','first_name','middle_name','last_name','adm_mark','admission_no','dob','doa','email','gender','phone_no');
        $data['school_id'] = auth()->user()->school->id;
        $data['stream_id'] = $request->stream;
        $data['intake_id'] = $request->intake;
        $data['dormitory_id'] = $request->dormitory;
        $data['admin_id'] = Auth::user()->admin->id;
        $data['parent_id'] = $request->parent;
        $data['blood_group'] = $request->blood_group;
        $data['position'] = $request->student_position;
        $data['active'] = $request->active;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->studentRepository->delete($id);
	}

	public function updateStudentInfo($request, $student_id){
        $info = StudentInfo::firstOrCreate(['student_id' => $student_id]);
        $info->student_id = $student_id;
        $info->religion = (!empty($request->religion)) ? $request->religion : '';
        $info->fathers_name = (!empty($request->father_name)) ? $request->father_name : '';
        $info->fathers_phone_number = (!empty($request->fathers_phone_number)) ? $request->fathers_phone_number : '';
        $info->fathers_national_id = (!empty($request->fathers_national_id)) ? $request->fathers_national_id : '';
        $info->fathers_occupation = (!empty($request->fathers_occupation)) ? $request->fathers_occupation : '';
        $info->fathers_designation = (!empty($request->fathers_designation)) ? $request->fathers_designation : '';
        $info->fathers_annual_income = (!empty($request->fathers_annual_income)) ? $request->fathers_annual_income : 0;
        $info->mothers_name = (!empty($request->mothers_name)) ? $request->mothers_name : '';
        $info->mothers_phone_number = (!empty($request->mothers_phone_number)) ? $request->mothers_phone_number : '';
        $info->mothers_national_id = (!empty($request->mothers_national_id)) ? $request->mothers_national_id : '';
        $info->mothers_occupation = (!empty($request->mothers_occupation)) ? $request->mothers_occupation : '';
        $info->mothers_designation = (!empty($request->mothers_designation)) ? $request->mothers_designation : '';
        $info->mothers_annual_income = (!empty($request->mothers_annual_income)) ? $request->mothers_annual_income : 0;
        $info->guardian_phone_number = (!empty($request->guardian_phone_number)) ? $request->guardian_phone_number : '';
        $info->guardian_occupation = (!empty($request->guardian_occupation)) ? $request->guardian_occupation : '';
        $info->home_email_address = (!empty($request->home_email_address)) ? $request->home_email_address : '';
        $info->home_postal_address = (!empty($request->home_postal_address)) ? $request->home_postal_address : '';
        $info->admin_id = auth()->user()->admin->id;
        $info->save();
    }

    public function getStudentsByStreamId($streamId)
    {
    	return Student::where(['school_id'=>Auth::user()->school->id,'stream_id'=>$streamId])
    			->with('stream')->get();
    }

    public function getClassNameByStudentName($fullName)
    {
    	$schoolStudents = Auth::user()->school->students;
    	foreach($schoolStudents as $student){
    		if($student->full_name === $fullName){

    			return $student->stream->name;
    		}
    	}	
    }
}