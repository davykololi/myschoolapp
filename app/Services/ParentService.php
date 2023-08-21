<?php

namespace App\Services;

use Auth;
use App\Repositories\ParentRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ParentFormRequest as StoreRequest;
use App\Http\Requests\ParentFormRequest as UpdateRequest;

class ParentService
{
    use ImageUploadTrait;
    protected $parentRepo;

    public function __construct(ParentRepository $parentRepo)
    {
        $this->parentRepo = $parentRepo;
    }

    public function all()
    {
        return $this->parentRepo->all();
    }

    public function eagerLoaded()
    {
        return $this->parentRepo->eagerLoaded();
    }

    public function create(StoreRequest $request)
    {
        $data = $this->createData($request);

        return $this->parentRepo->create($data);
    }

    public function update(UpdateRequest $request,$id)
    {
        $data = $this->updateData($request);

        return $this->parentRepo->update($data,$id);
    }

    public function getId($id)
    {
        return $this->parentRepo->getId($id);
    }

    public function createData(StoreRequest $request)
    {
        $data = $request->validated();
        $data['school_id'] = Auth::user()->school->id;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
    }

    public function updateData(UpdateRequest $request)
    {
        $data=$request->only('salutation','name','email','address','phone_no','id_no');
        $data['school_id'] = Auth::user()->school->id;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
    }

    public function delete($id)
    {
        return $this->parentRepo->delete($id);
    }
}