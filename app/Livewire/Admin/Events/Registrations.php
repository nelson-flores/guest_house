<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventPaymentPlan;
use App\Models\EventRegistration;
use App\Models\User;
use App\Services\pdf\DomPdfServiceImpl;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout("components.layouts.admin", ['title' => "Fichas"])]
class Registrations extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.events.registrations');
    }

    #[Computed()]
    public function registrations()
    {
        return EventRegistration::latest()->paginate(10);
    }

    #[Computed()]
    public function plans()
    {
        return EventPaymentPlan::get();
    }

    public function download($id)
    {
        $r = EventRegistration::find($id);

        $view = view('pdf.form', [
            'plans' => $this->plans(),
            'registration' => $r
        ])->render();
        
        $file = (new DomPdfServiceImpl())->setContent($view)->save();

        return response()->download(public_path($file))->deleteFileAfterSend(true);

    }

    public function delete($id)
    {
        EventRegistration::find($id)->delete();
    }
}
