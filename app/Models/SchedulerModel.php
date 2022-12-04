<?php
namespace App\Models;
use CodeIgniter\Model;
class SchedulerModel extends Model
{
 protected $table = 'schedule';
 protected $primaryKey = 'gerbong';
 protected $allowedFields = ['keberangkatan', 'jamk','tujuan','jamt','harga','kapasitas'];
}
