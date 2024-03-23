<?php

namespace App\Enums;

enum TeacherPositionEnum :  string{
	case CT = 'Class Teacher';
	case HT = 'Head Teacher';
	case DHT = 'Deputy Head Teacher';
	case HSD = 'Head Science Department';
	case AHSD = 'Assistant Head Science Department';
	case HHD = 'Head Humanity Department';
	case AHHD = 'Assistant Head Humanity Department';
	case HMD = 'Head Mathematics Department';
	case AHMD = 'Assistant Head Mathematics Department';
	case HLD = 'Head Languages Department';
	case AHLD = 'Assisant Head Languages Department';
	case ST = 'Staff Teacher';
}