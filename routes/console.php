<?php

use App\Console\Commands\Organizations\CheckAllOrganizations;
use Illuminate\Support\Facades\Schedule;

Schedule::command(CheckAllOrganizations::class)->weeklyOn(1, '03:00');
