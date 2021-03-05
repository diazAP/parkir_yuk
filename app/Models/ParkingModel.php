<?php

namespace App\Models;

use CodeIgniter\Model;

class ParkingModel extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }
    protected $table = 'parking';
    protected $primaryKey = 'parking_id';
    protected $allowedFields = [
        'parking_id',
        'user_id',
        'police_number',
        'unique_number',
        'cost',
        'date_started',
        'date_finished',
        'is_finished'
    ];
    protected $returnType       = 'object';
}
