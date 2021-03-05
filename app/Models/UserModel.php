<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'user_id',
        'name',
        'email',
        'photo',
        'role',
        'date_created',
        'date_edited'
    ];
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $createdField     = 'date_created';
    protected $updatedField     = 'date_edited';

    function index($filter)
    {
        function role_check($role)
        {
            if (!empty($role)) {
                return "AND role = '" . $role . "'";
            } else {
                return "";
            }
        }

        function keyword_check($keyword)
        {
            if (!empty($keyword)) {
                return "AND name LIKE '%" . $keyword . "%' OR email LIKE '%" . $keyword . "%'";
            } else {
                return "";
            }
        }

        function limit($page, $per_page)
        {
            if (!empty($page)) {
                return "LIMIT " . (($page * $per_page) - $per_page) . ", " . $per_page . " ";
            } else {
                return "LIMIT 0, " . $per_page . " ";
            }
        }

        $data = "
        SELECT *
        FROM user
        WHERE user_id IS NOT NULL
        " . role_check($filter['role']) . "
        " . keyword_check($filter['keyword']) . "
        ORDER BY date_created DESC
        " . limit($filter['page'], $filter['per_page']) . "
        ";

        $total = "
        SELECT COUNT(user_id) as total
        FROM user
        WHERE user_id IS NOT NULL
        " . role_check($filter['role']) . "
        " . keyword_check($filter['keyword']) . "
        ";

        return [
            'data'  => $this->db->query($data)->getResult(),
            'total' => $this->db->query($total)->getRow()->total
        ];
    }

    function by_id($user_id)
    {
        $query = "SELECT *, (SELECT COUNT(parking_id) as parking_total FROM parking WHERE is_finished = 1 AND parking.user_id = user.user_id) as parking_total, (SELECT SUM(cost) as cost_total FROM parking WHERE is_finished = 1 AND parking.user_id = user.user_id) as cost_total FROM user WHERE user_id = " . $this->db->escape($user_id);
        return $this->db->query($query)->getRow();
    }
}
