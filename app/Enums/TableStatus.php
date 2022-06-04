<?php

namespace App\Enums;

enums TableStatus: string {
	case Panding = "panding",
	case Available = "available",
	case Unavailable = "unavailable",
}