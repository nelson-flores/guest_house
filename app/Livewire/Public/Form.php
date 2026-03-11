<?php

namespace App\Livewire\Public;

use App\Helpers\Subcribers;
use App\Models\Event;
use App\Models\EventPaymentPlan;
use App\Models\EventRegistration;
use App\Models\User;
use App\Services\pdf\DomPdfServiceImpl;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout("components.layouts.app", ['title' => "Cadastro"])]
class Form extends Component
{
    use Subcribers;
    public $registration_id = null;
    public $event_id = null;
    public $full_name = null;
    public $email = null;
    public $phone = null;
    public $address = null;
    public $company_activity = null;
    public $special_needs = null;
    public $additional_observations = null;
    public $company_name = null;
    public $participant_type = null;
    public $event_payment_plan_id = null;


    protected $rules = [
        "full_name" => "required",
        "email" => "required|email",
        "phone" => "required",
        "address" => "required",
        "company_activity" => "required",
        "company_name" => "required",
        "event_payment_plan_id" => "required",

    ];


    #[Computed()]
    public function plans()
    {
        return EventPaymentPlan::get();
    }

    public function submit()
    {
        try {
            beginTransaction();

            $user = User::factory()->create();
            //  $data = $this->validate();
            $event = Event::first();

            $plan = EventPaymentPlan::find($this->event_payment_plan_id);


            $event_reg = EventRegistration::create([
                "participant_id" => $user->id,
                "event_id" => $event->id,
                "full_name" => $this->full_name,
                "email" => $this->email,
                "phone" => $this->phone,
                "address" => $this->address,
                "company_activity" => $this->company_activity,
                "company_name" => $this->company_name,
                "participant_type" => 'exhibitor',
                "company_sizetype" => $plan->company_sizetype,
                "event_payment_plan_id" => $this->event_payment_plan_id,
                'special_needs' => $this->special_needs,
                'additional_observations' => $this->additional_observations,
            ]);

            $this->registration_id = $event_reg->id;
            commitTransaction();
            session()->flash('success', 'Dados enviados com sucesso! Entraremos em contato em breve.');
        } catch (\Throwable $th) {
            rollbackTransaction();
            session()->flash('error', 'Ocorreu um erro ao realizar o cadastro:' . addslashes($th->getMessage()));
        }
    }

    public function download($id)
    {
        $r = EventRegistration::find($id);

        $view = view('pdf.form', [
            'plans' => $this->plans(),
            'registration' => $r
        ])->render();
        $file = (new DomPdfServiceImpl())->setContent($view)->save();


        $this->reset([
            'registration_id',
            'event_id',
            'full_name',
            'email',
            'phone',
            'address',
            'company_activity',
            'special_needs',
            'additional_observations',
            'company_name',
            'participant_type',
            'event_payment_plan_id'
        ]);

        return response()->download(public_path($file))->deleteFileAfterSend(true);
    }

    public function render()
    {
        return view('livewire.public.form');
    }
}
