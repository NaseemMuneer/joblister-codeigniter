<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categories;
use App\Models\Jobs;

class JobController extends BaseController
{
    private $category_model = null;
    private $job_model = null;

    public function __construct()
    {
        $this->category_model = new Categories();
        $this->job_model = new Jobs();
    }



    public function index()
    {
        $jobs = $this->job_model->findAll();

        $categories = $this->category_model->findAll();

        // if(isset($_GET['category'])){
        //     $category = $_GET['category'];
        //     $jobs = Jobs::where('category_id', $category)->get();
        // }

        return view('home', ['categories' => $categories, 'jobs' => $jobs]);
    }

    public function view_job($id)
    {
        $job = $this->job_model->find($id);
        return view('view-job', ['job' => $job],);
    }

    public function create_job()
    {

        $categories = $this->category_model->findAll();

        return view('create-job', ['categories' => $categories]);
    }

    //SAVE JOB
    public function store()
    {
        $categories = $this->category_model->findAll();


        $data = [
            'company' => $this->request->getPost('company'),
            'job_title' => $this->request->getPost('job_title'),
            'description' => $this->request->getPost('description'),
            'salary' => $this->request->getPost('salary'),
            'location' => $this->request->getPost('location'),
            'contact_user' => $this->request->getPost('contact_user'),
            'contact_email' => $this->request->getPost('contact_email'),
            'category_id' => $this->request->getPost('category'),
        ];


        helper(['form']);
        $categories = $this->category_model->findAll();

        if ($this->request->getMethod() == 'post') {

            $save = [

            ];

            $rules = [
                'company' => 'required',
                'category' => 'required',
                'job_title' => 'required',
                'description' => 'required',
                'location' => 'required',
                'salary' => 'required',
                'contact_user' => 'required|decimal|',
                'contact_email' => 'required|min_length[10]',
            ];

            if ($this->validate($rules)) {
                //them insertion
                $this->job_model->insert($data);
                return redirect()->to('/')->with('success', 'Job Created');
            } else {
                $data['validation'] = $this->validator;

            }
        }

        return view('create-job', ['data' => $data, 'categories' => $categories,]);
    }

    ///job update
    public function update($id)
    {

        $data = [
            'company' => $this->request->getPost('company'),
            'job_title' => $this->request->getPost('job_title'),
            'description' => $this->request->getPost('description'),
            'salary' => $this->request->getPost('salary'),
            'location' => $this->request->getPost('location'),
            'contact_user' => $this->request->getPost('contact_user'),
            'contact_email' => $this->request->getPost('contact_email'),
            'category_id' => $this->request->getPost('category'),
        ];

        $this->job_model->update($id, $data);

        return redirect()->to('/')->with('success', 'Job Updated');
    }


    //delete 
    public function delete($id)
    {
        $this->job_model->delete($id);
        return redirect()->to('/')->with('success', 'Job Deleted');
    }



    //update
    public function edit_job($id)
    {
        $category_id = $this->job_model->find($id);
        $categories = $this->category_model->findAll();

        // $job = $this->job_model->update();
        $job = $this->job_model->find($id);
        $category = $this->category_model->find($id);

        return view('edit-job', ['category' => $category, 'job' => $job, 'categories' => $categories],);
    }



    public function search()

    {
        //get categories
        $categories = $this->category_model->findAll();
        //get jobs

        // get category id 
        $category_id = $this->request->getGet('category');

        //Query


        $jobs = isset($_GET['category']) ? $_GET['category'] : null;

        if ($jobs) {

            $jobs = $this->job_model->where('category_id', $category_id)->findAll();

            return view('home', ['categories' => $categories, 'jobs' => $jobs]);
        } else {
            $jobs = $this->job_model->findAll();
            return view('home', ['categories' => $categories, 'jobs' => $jobs]);
        }
    }
}
