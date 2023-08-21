<?php

namespace App\Enums;

enum AdminsEnum :  string{
	case SA = 'senioradmin';
	case DSA = 'deputysenioradmin';
	case SR = 'studentregistrar';
	case AR = 'academicregistrar';
	case ER = 'examregistrar';
	case OA = 'ordinaryadmin';
}