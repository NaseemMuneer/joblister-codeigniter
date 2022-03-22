<?php

namespace App\Controllers;

use App\Models\Jobs;

class Form extends BaseController
{

  public function index()
  {

    helper(['form']);

    $data = [];
    $data['categories'] = [
      'student',
      'teacher',
      'principle',
    ];

    if($this->request->getMethod() == 'post') {
      $rules = [
        'email' => 'required',
        'password' => 'required',
        // 'category' => 'required',
        'category' => 'in_list[student,teacher]',
        
      ];

      if($this->validate($rules)) {
        //them insertion
      }
      else{
        $data['validation'] = $this->validator;
      }
    }

    return view('form',$data);
  }


}
