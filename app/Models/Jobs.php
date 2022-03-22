<?php

namespace App\Models;

use CodeIgniter\Model;

class Jobs extends Model
{

    protected $table            = 'jobs';
    protected $allowedFields    = ['company','job_title','description','salary','location','contact_user','contact_email', 'category_id'];
    protected $primaryKey = 'id';
    // Dates
    protected $useTimestamps = false;


    // Validation
    protected $validationRules = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
