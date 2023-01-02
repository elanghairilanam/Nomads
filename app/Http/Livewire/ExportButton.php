<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Livewire;

class ExportButton extends Component
{
    public function export()
    {
        return Storage::disk('exports')->download('export.csv');
    }

    public function can_download_export()
    {
        Livewire::test(ExportButton::class)
            ->call('download')
            ->assertFileDownloaded('export');
    }

}
