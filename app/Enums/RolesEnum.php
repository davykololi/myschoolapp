<?php

namespace App\Enums;

enum RolesEnum :  string{
	case SUPERADMIN = 'superadmin';
	case ADMIN = 'admin';
	case TEACHER = 'teacher';
	case STUDENT = 'student';
	case ACCOUNTANT = 'accountant';
	case LIBRARIAN = 'librarian';
	case SUBORDINATE = 'subordinate';
	case MATRON = 'matron';
	case MYPARENT = 'parent';
}