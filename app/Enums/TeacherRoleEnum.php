<?php

namespace App\Enums;

enum TeacherRoleEnum :  string{
	case CT = 'classteacher';
	case HT = 'headteacher';
	case DHT = 'deputyheadteacher';
	case HSD = 'headsciencedept';
	case AHSD = 'assistantheadsciencedept';
	case HHD = 'headhumanitydept';
	case AHHD = 'assistantheadhumanitydept';
	case HMD = 'headmathsdept';
	case AHMD = 'assistantheadmathsdept';
	case HLD = 'headlanguagesdept';
	case AHLD = 'assisantheadlanguagesdept';
	case ST = 'staffteacher';
}