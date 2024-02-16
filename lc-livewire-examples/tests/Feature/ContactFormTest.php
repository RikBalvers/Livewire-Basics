<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_main_page_contains_contact_form_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('contact-form');
    }

    public function test_contact_form_sends_out_an_email()
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name', 'Rik')
            ->set('email', 'rik@mail.com')
            ->set('phone', '0612345678')
            ->set('message', 'Rik heeft kik')
            ->call('submitForm')
            ->assertSee('We received your message successfully and will get back to you shortly!');

        Mail::assertSent(function (ContactFormMailable $mail) {
            $mail->build();

            return $mail->hasTo('hello@example.com') &&
                $mail->hasFrom('rik@mail.com') &&
                $mail->subject == 'Contact Form Submission';
        });
    }

    public function test_contact_form_name_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('email', 'rik@mail.com')
            ->set('phone', '0612345678')
            ->set('message', 'Rik heeft kik')
            ->call('submitForm')
            ->assertHasErrors(['name' => 'required']);
    }

    public function test_contact_form_message_field_has_minimum_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('message', 'kik')
            ->call('submitForm')
            ->assertHasErrors(['message' => 'min']);
    }
}
