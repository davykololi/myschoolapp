<?php

namespace App\Enums;

enum StudentPositionEnum :  string{
	case OS = 'Ordinary Student';
	case SL = 'Student Leader';
	case DSL = 'Deputy Student Leader';
	case SP = 'Class Prefect';
	case ASP = 'Assistant Class Prefect';
	case TK = 'Time Keeper';
}