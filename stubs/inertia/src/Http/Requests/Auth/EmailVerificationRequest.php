<?php

namespace App\Modules\{{pluralClass}}\Http\Requests\Auth;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

/**
 * @see \Illuminate\Foundation\Auth\EmailVerificationRequest
 */
class EmailVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (! hash_equals((string) $this->user('{{singularSlug}}')->getKey(), (string) $this->route('id'))) {
            return false;
        }

        if (! hash_equals(sha1($this->user('{{singularSlug}}')->getEmailForVerification()), (string) $this->route('hash'))) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Fulfill the email verification request.
     *
     * @return void
     */
    public function fulfill()
    {
        if (! $this->user('{{singularSlug}}')->hasVerifiedEmail()) {
            $this->user('{{singularSlug}}')->markEmailAsVerified();

            event(new Verified($this->user('{{singularSlug}}')));
        }
    }

    /**
     * Configure the validator instance.
     *
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        return $validator;
    }
}
